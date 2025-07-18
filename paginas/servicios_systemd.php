<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>servicios</title>
    <link rel="stylesheet" href="../css/estilos_systemd.css">

</head>
<body>
	<h3>Servicios de systemd</h3>

   <p class="primer">los servidos en systemd son programas que utiliza para el correcto funcionamiento de el systema un ejemplo de esto seria</p> 
   <p>apache2 un servidor web clasico que proporciona al systema la capacidad de compartir contenido y servidr archivos entre otro</p>
   <p>algunos de los servicios que se utilizan son wpa_sipplicant , sddm , acpid </p>


         <h3>Rutas</h3>


    <p class="primer"> [ acpid.service ] - - -  este servicio se encarga de los dispositivos acpi que son los llamados perifericos como el disco duro o la pantalla</p>
    <p>este servicio se encuantra en /lib/systemd/system/acpid.service  y este es su contenido </p>

   <p class="segundo"> [Unit] </p>
   <p class="segundo">Description=ACPI event daemon</p>
   <p class="segundo">Requires=acpid.socket</p>
   <p class="segundo">ConditionVirtualization=!container</p>
   <p class="segundo">Documentation=man:acpid(8)

[Service]
StandardInput=socket
EnvironmentFile=/etc/default/acpid
ExecStart=/usr/sbin/acpid $OPTIONS

[Install]
WantedBy=multi-user.target

</p>
</body>

</html>

