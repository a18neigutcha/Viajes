USE viajes;
INSERT INTO usuari values
			("Neil","contra1"),
            ("Adrian","contra2"),
            ("Ferran","contra3");

INSERT INTO experiencia values 
			(1,"Viatge a bcn","una ciutat molt bruta bla bla bla", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95777.5288157847!2d2.0787279470992464!3d41.39476881460054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona!5e0!3m2!1ses!2ses!4v1575893740451!5m2!1ses!2ses",5,2,"publicada","Neil"),
            (2,"Viatge a bcn 2","molt maco tot", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95777.5288157847!2d2.0787279470992464!3d41.39476881460054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona!5e0!3m2!1ses!2ses!4v1575893740451!5m2!1ses!2ses",6,4,"publicada","Adrian"),
            (3,"Viatge a bcn 3","muy mal", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95777.5288157847!2d2.0787279470992464!3d41.39476881460054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona!5e0!3m2!1ses!2ses!4v1575893740451!5m2!1ses!2ses",2,8,"rebutjada","Ferran"),
            (4,"Viatge a sitges","molt maco tot", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12001.405385175822!2d1.7946865338913647!3d41.23590405308926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a3804720b208fb%3A0x7061f1fb2907c8f9!2s08870%20Sitges%2C%20Barcelona!5e0!3m2!1ses!2ses!4v1575894013607!5m2!1ses!2ses",5,2,"publicada","Ferran"),
            (5,"Viatge a sitges 2","some review", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12001.405385175822!2d1.7946865338913647!3d41.23590405308926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a3804720b208fb%3A0x7061f1fb2907c8f9!2s08870%20Sitges%2C%20Barcelona!5e0!3m2!1ses!2ses!4v1575894013607!5m2!1ses!2ses",0,0,"esborrany","Adrian"),
            (6,"Viatge a sitges 3","Ens ho vam passar molt be bla bla bla", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12001.405385175822!2d1.7946865338913647!3d41.23590405308926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a3804720b208fb%3A0x7061f1fb2907c8f9!2s08870%20Sitges%2C%20Barcelona!5e0!3m2!1ses!2ses!4v1575894013607!5m2!1ses!2ses",0,0,"rebutjada","Neil");  
            
INSERT INTO categories values 
		(1,"Platja"),
        (2,"Muntanya"),
        (3,"Interior"),
        (4,"Aventures"),
        (5,"Relax");
INSERT INTO pertany values
		(1,1),
        (1,2),
        (2,1),
        (2,5),
        (3,3),
        (4,4),
        (4,5),
        (4,1),
        (5,2),
        (5,3),
        (6,1),
        (6,4);
