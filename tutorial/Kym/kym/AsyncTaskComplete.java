package in.skylinelabs.kym;


import com.google.gson.JsonObject;

import org.json.JSONException;

/**
 * Created by Jay Lohokare on 16-Oct-16.
 */
public interface AsyncTaskComplete {
    void handleResult(JsonObject result, String action) throws JSONException;


}
