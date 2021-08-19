-- --------------------------------------------------------
-- 1) La query para el calculo de costos
-- 2) Con un presupuesto de 3.000.000, consideraria seriamente incrementar el carrier.capacity como primera opcion de no
-- ser posible me centraria en las zonas que tengan un mayor costo de viaje y poco tiempo como ser AMBA y BS
-- 
-- --------------------------------------------------------


SELECT  carrier.carrier_id, costos.Zona, (costos.precio * carrier.capacidad) * cantidadDeEnvios.cantidad_de_envios / carrier.capacidad),
FROM costos, cantidadDeEnvios, carrier
WHERE carrier.carrier_id = costos.carrierid
AND costos.Zona = cantidadDeEnvios.zona