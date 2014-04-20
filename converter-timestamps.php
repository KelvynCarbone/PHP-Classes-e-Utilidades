        
        
        
        public static function dateToDB($data)
        {
            $tempo=null;
            if(strlen(trim($data))>10){
                $tempo = substr($data,10);
            }

            $data = substr($data,0,10);

            return implode('-',array_reverse(explode('/',$data))).$tempo;
        }
        

        /**
         * Entra no formato AAAA-MM-DD  e sai DD/MM/AAAA
         *
         * @param string $data
         * @return string
         */
         
        public static function dateToShow($data)
        {
            $tempo=null;
            if(strlen(trim($data))>10){
                $tempo = substr($data,10);
            }

            $data = substr($data,0,10);

            return implode('/',array_reverse(explode('-',$data))).$tempo;
        }
        
