<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

    class ImpiantoController {
        
        function index(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            $response->getBody()->write(json_encode($impianto->JsonSerialize()));
            return $response->withHeader('Content-Type', 'application/json');
        }

        function rilevatoriUmidita(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $u2 = new RilevatoreUmidita("Pisa","Rilevatore-umidita-2", "jklfkjlasòka");
            $u1 = new RilevatoreUmidita("Firenze","Rilevatore-umidita-1", "dgsgsg");

            $impianto->addRilevatore($u1);
            $impianto->addRilevatore($u2);
            $rilevatori = $impianto->get_rilevatori();

            $response->getBody()->write(json_encode($rilevatori));

            
            
            return $response->withHeader('Content-Type', 'application/json');
        }
        
        function rilevatoriUmiditaByID(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $u2 = new RilevatoreUmidita("Pisa","Rilevatore-umidita-2", "jklfkjlasòka");
            $u1 = new RilevatoreUmidita("Firenze","Rilevatore-umidita-1", "dgsgsg");

            $impianto->addRilevatore($u1);
            $impianto->addRilevatore($u2);
            $rilevatori = $impianto->get_rilevatori();

            $idR = $args['identificativo'];
            
            foreach($rilevatori as $r){
                if($r->get_identificativo() == $idR){
                    $response->getBody()->write(json_encode($r));
                }
            
            }
            
            return $response->withHeader('Content-Type', 'application/json');
        }

        function rilevatoriUmiditaMisurazioni(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $u2 = new RilevatoreUmidita("Pisa","Rilevatore-umidita-2", "jklfkjlasòka");
            $u1 = new RilevatoreUmidita("Firenze","Rilevatore-umidita-1", "dgsgsg");

            $m1 = new Misurazioni("26/05/2023", "50");
            $m2 = new Misurazioni("27/05/2023", "60");

            $u1->addMisurazione($m1);
            $u2->addMisurazione($m2);

            $impianto->addRilevatore($u1);
            $impianto->addRilevatore($u2);

            $rilevatori = $impianto->get_rilevatori();

            $idR = $args['identificativo'];
            
            foreach($rilevatori as $r){
                if($r->get_identificativo() == $idR){
                    $response->getBody()->write(json_encode($r->get_misurazioni()));
                }
            
            }

            
            
            return $response->withHeader('Content-Type', 'application/json');
        }
        

        function rilevatoriTemperatura(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $t2 = new RilevatoreTemperatura("Acqua","Rilevatore-temperatura-2", "jklfkjlasòka");
            $t1 = new RilevatoreTemperatura("Aria","Rilevatore-temperatura-1", "dgsgsg");

            $impianto->addRilevatore($t1);
            $impianto->addRilevatore($t2);
            $rilevatori = $impianto->get_rilevatori();

            $response->getBody()->write(json_encode($rilevatori));

            
            
            return $response->withHeader('Content-Type', 'application/json');
        }
        
        function rilevatoriTemperaturaByID(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $t2 = new RilevatoreTemperatura("Aria","Rilevatore-temperatura-2", "jklfkjlasòka");
            $t1 = new RilevatoreTemperatura("Acqua","Rilevatore-temperatura-1", "dgsgsg");

            $impianto->addRilevatore($t1);
            $impianto->addRilevatore($t2);
            $rilevatori = $impianto->get_rilevatori();

            $idR = $args['identificativo'];
            
            foreach($rilevatori as $r){
                if($r->get_identificativo() == $idR){
                    $response->getBody()->write(json_encode($r));
                }
            
            }
            
            return $response->withHeader('Content-Type', 'application/json');
        }

        function rilevatoriTemperaturaMisurazioni(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $t2 = new RilevatoreTemperatura("Aria","Rilevatore-temperatura-2", "jklfkjlasòka");
            $t1 = new RilevatoreTemperatura("Acqua","Rilevatore-temperatura-1", "dgsgsg");

            $m1 = new Misurazioni("26/05/2050", "800");
            $m2 = new Misurazioni("27/05/2050", "900");

            $t1->addMisurazione($m1);
            $t2->addMisurazione($m2);

            $impianto->addRilevatore($t1);
            $impianto->addRilevatore($t2);

            $rilevatori = $impianto->get_rilevatori();

            $idR = $args['identificativo'];
            
            foreach($rilevatori as $r){
                if($r->get_identificativo() == $idR){
                    $response->getBody()->write(json_encode($r->get_misurazioni()));
                }
            
            }

            
            
            return $response->withHeader('Content-Type', 'application/json');
        }

        function rilevatoriUmiditaMisurazioniMaggioreDi(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $u2 = new RilevatoreUmidita("Pisa","Rilevatore-umidita-2", "jklfkjlasòka");
            $u1 = new RilevatoreUmidita("Firenze","Rilevatore-umidita-1", "dgsgsg");

            $m1 = new Misurazioni("26/05/2023", "50");
            $m2 = new Misurazioni("27/05/2023", "60");

            $u1->addMisurazione($m1);
            $u2->addMisurazione($m2);

            $impianto->addRilevatore($u1);
            $impianto->addRilevatore($u2);

            $rilevatori = $impianto->get_rilevatori();

            $idR = $args['identificativo'];
            
            foreach($rilevatori as $r){
                if($r->get_identificativo() == $idR){
                    
                    $misurazioni = $r->get_misurazioni();

                    foreach($misurazioni as $m){

                        if($m->get_valore() > $args["valore"]){

                            $response->getBody()->write(json_encode($m));

                        }
                        

                    }
                    
                }
            
            }

            
            
            return $response->withHeader('Content-Type', 'application/json');
        }

        function rilevatoriTemperaturaMisurazioniMaggioreDi(Request $request, Response $response, $args) {
            $impianto = new Impianto("impianto1", "178.351", "845.663");
            
            $t2 = new RilevatoreTemperatura("Aria","Rilevatore-temperatura-2", "jklfkjlasòka");
            $t1 = new RilevatoreTemperatura("Acqua","Rilevatore-temperatura-1", "dgsgsg");

            $m1 = new Misurazioni("26/05/2050", "800");
            $m2 = new Misurazioni("27/05/2050", "900");

            $t1->addMisurazione($m1);
            $t2->addMisurazione($m2);

            $impianto->addRilevatore($t1);
            $impianto->addRilevatore($t2);

            $rilevatori = $impianto->get_rilevatori();

            $idR = $args['identificativo'];
            
            foreach($rilevatori as $r){
                if($r->get_identificativo() == $idR){
                    
                    $misurazioni = $r->get_misurazioni();

                    foreach($misurazioni as $m){

                        if($m->get_valore() > $args["valore"]){

                            $response->getBody()->write(json_encode($m));

                        }
                        

                    }
                    
                }
            
            }

            
            
            return $response->withHeader('Content-Type', 'application/json');
        }
    }
?>