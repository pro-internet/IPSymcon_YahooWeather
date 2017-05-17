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
            ;
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
            $zipcode    = $this->Zipcode;
            $degree     = $this->degree;

            $result = file_get_contents('http://weather.yahooapis.com/forecastrss?p=' . $zipcode . '&u=' . $degree);
            $xml = simplexml_load_string($result);
            echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        }
    }
?>