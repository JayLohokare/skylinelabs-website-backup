package in.skylinelabs.kym;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;

import com.google.gson.JsonArray;
import com.google.gson.JsonObject;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;


public class ActionHandler {
    AsyncTaskComplete callback;
    ProgressDialog progressDialog;
    private Context context;
    private String address = "192.168.43.128:80";
    private String ACCOUNT_URL = "http://" + address +"/user.php";
    private String SMS_URL = "http://" + address +"/sms.php";
    private String LOAN_SMS_URL = "http://" + address +"/loan_sms.php";
    private String CHAT_BOT_URL = "http://" + address +"/summary.php";
    private String ACCOUNT_BALANCE_URL = "http://" + address +"/give_balance.php";
    private String GET_ACCOUNTS_URL = "http://" + address +"/give_account.php";


    public ActionHandler(Context context, AsyncTaskComplete callback) {
        this.callback = callback;
        this.context = context;
        progressDialog = new ProgressDialog(context);
    }


    public void login(String name,  String twitter_handle ) {
        postJsonObject(createLoginJsonObject(name, twitter_handle), ACCOUNT_URL, "Login", "Logging In\nPlease Wait");
    }

    public void sendSMS(String bankname, String card, String vendor,  String amount,  String balance, String month, String year, String type, String username) {
        postJsonObject(createSMSJsonObject(bankname, card, vendor, amount, balance, month, year, type, username), SMS_URL, "SMS", "Logging In\nPlease Wait");
    }
    public void sendLoanSMS(String type, String account_no, String amount, int p_d, String username) {
        postJsonObject(createLoanSMSJsonObject(type, account_no, amount, p_d, username), LOAN_SMS_URL, "LOAN_SMS", "Logging In\nPlease Wait");
    }

    public void getUserSummary(String username) {
        postJsonObject(createGetUserSummaryJsonObject(username), CHAT_BOT_URL, "Get_User_Summary", "Logging In\nPlease Wait");
    }

    public void get_account_balance(String username,String account, String month, String year) {
        JsonObject jsonObject = new JsonObject();
        jsonObject.addProperty("username", username);
        jsonObject.addProperty("account_number", account);
        jsonObject.addProperty("month", month);
        jsonObject.addProperty("year", year);
        postJsonObject(jsonObject, ACCOUNT_BALANCE_URL, "Account_balance", "Getting your balance\nPlease wait");


    }
    public void get_accounts(String username){
        JsonObject jsonObject = new JsonObject();
        jsonObject.addProperty("username", username);
        postJsonObject(jsonObject, GET_ACCOUNTS_URL, "get_accounts", "Getting your accounts\nPlease wait");

    }
    private JsonObject createLoginJsonObject(String name,  String twitter_handle) {
        JsonObject jsonObject = new JsonObject();
        jsonObject.addProperty("username", name);
        jsonObject.addProperty("twitter_handle", twitter_handle);
        return jsonObject;
    }

    private JsonObject createSMSJsonObject(String bank_name, String card, String vendor,  String amount,  String balance, String month, String year, String type, String username) {
        JsonObject jsonObject = new JsonObject();
        jsonObject.addProperty("bank_name", bank_name);
        jsonObject.addProperty("account_number", card);
        jsonObject.addProperty("vendor", vendor);
        jsonObject.addProperty("amount", amount);
        jsonObject.addProperty("balance", balance);
        jsonObject.addProperty("month", month);
        jsonObject.addProperty("year", year);
        jsonObject.addProperty("type", type);
        jsonObject.addProperty("username", username);

        return jsonObject;
    }

    private JsonObject createLoanSMSJsonObject(String type, String account_no, String amount, int p_d, String username) {
        JsonObject jsonObject = new JsonObject();
        jsonObject.addProperty("account_number", account_no);
        jsonObject.addProperty("amount", amount);
        jsonObject.addProperty("type", type);
        jsonObject.addProperty("username", username);
        jsonObject.addProperty("p_d", p_d);
        Log.i("c s", type);
        Log.i("  c s", account_no);
        Log.i("scv s", amount);
        Log.i("sv",username);
        Log.i("ssdv", String.valueOf(p_d));
        Log.i("name", "rshl");

        return jsonObject;
    }


    private JsonObject createGetUserSummaryJsonObject(String name) {
        JsonObject jsonObject = new JsonObject();

        Date d = new Date( );
        SimpleDateFormat mft = new SimpleDateFormat("MM");
        SimpleDateFormat yft = new SimpleDateFormat("yyyy");
        String month = mft.format(d);
        String year = yft.format(d);

        jsonObject.addProperty("username", name);
        jsonObject.addProperty("month", month);
        jsonObject.addProperty("year", year);
        return jsonObject;
    }

    private void postJsonObject(final JsonObject jsonObject, String url, final String action, String progress_status) {
        HttpJsonPost httpJsonPost = new HttpJsonPost(url, action, progress_status, context, callback);
        httpJsonPost.execute(jsonObject);
    }
}
