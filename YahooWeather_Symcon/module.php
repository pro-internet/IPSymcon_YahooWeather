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
 
        /**
        * ABC_MeineErsteEigeneFunktion($id);
        */
        public function getWeatherForcast() {
            // Get the Weather Forcast for the Day!
            $zipcode    = $this->ReadPropertyString("Zipcode");
            $degree     = $this->ReadPropertyString("Degree");

            $BASE_URL = "http://www.yahooapis.com/v1/base.rng";
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