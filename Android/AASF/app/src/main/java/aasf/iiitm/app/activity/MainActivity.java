package aasf.iiitm.app.activity;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.google.firebase.messaging.FirebaseMessaging;
import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;

import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Iterator;

import javax.net.ssl.HttpsURLConnection;

import aasf.iiitm.app.R;
import aasf.iiitm.app.helper.SQLiteHandler;
import aasf.iiitm.app.helper.SessionManager;

public class MainActivity extends Activity {

	private TextView txtName;
	private TextView txtEmail;
	private Button btnLogout;
	String scannedData;
	String name;


	Button scanBtn;
	private SQLiteHandler db;
	private SessionManager session;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
FirebaseMessaging.getInstance().subscribeToTopic("news");
		txtName = (TextView) findViewById(R.id.name);
		txtEmail = (TextView) findViewById(R.id.email);
		btnLogout = (Button) findViewById(R.id.btnLogout);
ImageView imageView=findViewById(R.id.img);
		// SqLite database handler
		db = new SQLiteHandler(getApplicationContext());

		// session manager
		session = new SessionManager(getApplicationContext());

		if (!session.isLoggedIn()) {
			logoutUser();
		}

		// Fetching user details from SQLite
		HashMap<String, String> user = db.getUserDetails();

		 name = user.get("name");
		String email = user.get("email");

		// Displaying the user details on the screen
		txtName.setText(name);
		//txtEmail.setText(email);
		Glide.with(this)
				.load("http://aasf.in/aasf/profile/upload/"+email).into(imageView);
		// Logout button click event
		btnLogout.setOnClickListener(new View.OnClickListener() {

			@Override
			public void onClick(View v) {
				logoutUser();
			}
		});

		final Activity activity =this;
		scanBtn = (Button)findViewById(R.id.scan_btn);

		scanBtn.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View view) {
				IntentIntegrator integrator = new IntentIntegrator(activity);
				integrator.setDesiredBarcodeFormats(IntentIntegrator.QR_CODE_TYPES);
				integrator.setPrompt("Scan");
				integrator.setBeepEnabled(false);
				integrator.setCameraId(0);
				integrator.setBarcodeImageEnabled(false);
				integrator.initiateScan();
			}
		});
	}
	@Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
		IntentResult result = IntentIntegrator.parseActivityResult(requestCode,resultCode,data);
		if(result!=null) {
			scannedData = result.getContents();
			if (scannedData != null) {
				// Here we need to handle scanned data...
				new SendRequest().execute();


			}else {
			}
		}
		super.onActivityResult(requestCode, resultCode, data);
	}



	public class SendRequest extends AsyncTask<String, Void, String> {


		protected void onPreExecute(){}

		protected String doInBackground(String... arg0) {

			try{

				//Enter script URL Here
				URL url = new URL("https://script.google.com/macros/s/AKfycbz3B0mUOkRb1VIelPa2ss6IJoPjRlvg4MZ74N-0eQI3Zad_pxo/exec");

				JSONObject postDataParams = new JSONObject();
				TelephonyManager telephonyManager = (TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);
				String a=telephonyManager.getDeviceId();

				//Passing scanned code as parameter
				String fin=name+"o"+a;
				postDataParams.put("sdata",fin);



				Log.e("params",postDataParams.toString());

				HttpURLConnection conn = (HttpURLConnection) url.openConnection();
				conn.setReadTimeout(15000 /* milliseconds */);
				conn.setConnectTimeout(15000 /* milliseconds */);
				conn.setRequestMethod("GET");
				conn.setDoInput(true);
				conn.setDoOutput(true);

				OutputStream os = conn.getOutputStream();
				BufferedWriter writer = new BufferedWriter(
						new OutputStreamWriter(os, "UTF-8"));
				writer.write(getPostDataString(postDataParams));

				writer.flush();
				writer.close();
				os.close();

				int responseCode=conn.getResponseCode();

				if (responseCode == HttpsURLConnection.HTTP_OK) {

					BufferedReader in=new BufferedReader(new InputStreamReader(conn.getInputStream()));
					StringBuffer sb = new StringBuffer("");
					String line="";

					while((line = in.readLine()) != null) {

						sb.append(line);
						break;
					}

					in.close();
					return sb.toString();

				}
				else {
					return new String("false : "+responseCode);
				}
			}
			catch(Exception e){
				return new String("Exception: " + e.getMessage());
			}
		}

		@Override
		protected void onPostExecute(String result) {
			Toast.makeText(getApplicationContext(), "Scanned successfully!",
					Toast.LENGTH_LONG).show();

		}
	}

	public String getPostDataString(JSONObject params) throws Exception {

		StringBuilder result = new StringBuilder();
		boolean first = true;

		Iterator<String> itr = params.keys();

		while(itr.hasNext()){

			String key= itr.next();
			Object value = params.get(key);

			if (first)
				first = false;
			else
				result.append("&");

			result.append(URLEncoder.encode(key, "UTF-8"));
			result.append("=");
			result.append(URLEncoder.encode(value.toString(), "UTF-8"));

		}
		return result.toString();
	}
	/**
	 * Logging out the user. Will set isLoggedIn flag to false in shared
	 * preferences Clears the user data from sqlite users table
	 * */
	private void logoutUser() {
		session.setLogin(false);

		db.deleteUsers();

		// Launching the login activity
		Intent intent = new Intent(MainActivity.this, LoginActivity.class);
		startActivity(intent);
		finish();
	}
}
