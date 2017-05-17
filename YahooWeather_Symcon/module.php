<?
    // Klassendefinition
    class YahooWeather_Symcon extends IPSModule {
        
        // Constructor
        public function __construct($InstanceID) {
            // Don't delete this Row!
            parent::__construct($InstanceID);

         }

        // Create Instance
        public function Create() {
            // Don't delete this Row!
            parent::Create();
            $this->RegisterPropertyString("Zipcode", "55483");
            $this->RegisterPropertyString("Degree", "C");
 
        }
 
        // Überschreibt die intere IPS_ApplyChanges($id) Funktion
        public function ApplyChanges() {
            // Don't delete this Row!
            parent::ApplyChanges();
        }
 

        // Get the Weather Forcast for the Day!
        public function getWeatherForcast() {
            $zipcode    = $this->ReadPropertyString("Zipcode");
            $degree     = $this->ReadPropertyString("Degree");

            $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
            $yql_query = 'select item.condition from weather.forecast where woeid = 701780';
            $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
            // Make call with cURL
            $session = curl_init($yql_query_url);
            curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
            $json = curl_exec($session);
            // Convert JSON to PHP object
            $phpObj =  json_decode($json);
            var_dump($phpObj);
            return $phpObj;
        }
    }
?>