<?php

use App\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /*start creamos los sectores de la zona educativa*/
    public function run()
    {
    	/*start agregamos el sector Atención al ciudadano*/
    	Sector::create([
    		"sector"=>"Atención al Ciudadano",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector Atención al ciudadano*/
    	/*start agregamos el sector División de Educación Niños, Niñas y Población con Necesidades Educativas
Especiales*/
    	Sector::create([
    		"sector"=>"División de Educación Niños, Niñas y Población con Necesidades Educativas
Especiales",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector División de Educación Niños, Niñas y Población con Necesidades Educativas
Especiales*/
    	/*start agregamos el sector Seguridad Social/SISME*/
    	Sector::create([
    		"sector"=>"Seguridad Social/SISME",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Seguridad Social/SISME*/
    	/*start agregamos el sector Seguridad División de Supervisión*/
    	Sector::create([
    		"sector"=>"División de Supervisión",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector División de Supervisión*/
    	/*start agregamos el sector Coordinación de Registro Control de Estudio*/
    	Sector::create([
    		"sector"=>"Coordinación de Registro Control de Estudio",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector Coordinación de Registro Control de Estudio*/
    	/*start agregamos el sector Coordinación de Planteles Privados*/
    	Sector::create([
    		"sector"=>"Coordinación de Planteles Privados",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Coordinación de Planteles Privados*/
    	/*start agregamos el sector Coordinación de Municipios Escolares*/
    	Sector::create([
    		"sector"=>"Coordinación de Municipios Escolares",
    		"letter_code"=>"d"
    	]);
    	/*end agregamos el sector Coordinación de Municipios Escolares*/
    	/*start agregamos el sector Archivo y Tipeo*/
    	Sector::create([
    		"sector"=>"Archivo y Tipeo",
    		"letter_code"=>"e"
    	]);
    	/*end agregamos el sector Archivo y Tipeo*/
    	/*start agregamos el sector División de Gestión Interna*/
    	Sector::create([
    		"sector"=>"División de Gestión Interna",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector División de Gestión Interna*/
    	/*start agregamos el sector Coordinación de Gestión Humana*/
    	Sector::create([
    		"sector"=>"Coordinación de Gestión Humana",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector Coordinación de Gestión Humana*/
    	/*start agregamos el sector Oficina de Gremiales, Reposo, Vacaciones y Suplencias*/
    	Sector::create([
    		"sector"=>"Oficina de Gremiales, Reposo, Vacaciones y Suplencias",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Oficina de Gremiales, Reposo, Vacaciones y Suplencias*/
    	/*start agregamos el sector Oficina de Permisos y Área Social*/
    	Sector::create([
    		"sector"=>"Oficina de Permisos y Área Social",
    		"letter_code"=>"d"
    	]);
    	/*end agregamos el sector Oficina de Permisos y Área Social*/
    	/*start agregamos el sector Analistas de Gestión Humana*/
    	Sector::create([
    		"sector"=>"Analistas de Gestión Humana",
    		"letter_code"=>"d"
    	]);
    	/*end agregamos el sector Analistas de Gestión Humana*/
    	/*start agregamos el sector División de Adolescentes, Jóvenes y Población Adulta*/
    	Sector::create([
    		"sector"=>"División de Adolescentes, Jóvenes y Población Adulta",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector División de Adolescentes, Jóvenes y Población Adulta*/
    	/*start agregamos el sector Auditoria Interna*/
    	Sector::create([
    		"sector"=>"Auditoria Interna",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector Auditoria Interna*/
    	/*start agregamos el sector Coordinación de Media Técnica*/
    	Sector::create([
    		"sector"=>"Coordinación de Media Técnica",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Coordinación de Media Técnica*/
    	/*start agregamos el sector Coordinación de Media General*/
    	Sector::create([
    		"sector"=>"Coordinación de Media General",
    		"letter_code"=>"d"
    	]);
    	/*end agregamos el sector Coordinación de Media General*/
    	/*start agregamos el sector Coordinación Modalidad Adultos*/
    	Sector::create([
    		"sector"=>"Coordinación Modalidad Adultos",
    		"letter_code"=>"e"
    	]);
    	/*end agregamos el sector Coordinación Modalidad Adultos*/
    	/*start agregamos el sector Coordinación de Educación Física y Recreación*/
    	Sector::create([
    		"sector"=>"Coordinación de Educación Física y Recreación",
    		"letter_code"=>"f"
    	]);
    	/*end agregamos el sector Coordinación de Educación Física y Recreación*/
    	/*start agregamos el sector División de Comunidades Educativas y Unión con el Pueblo*/
    	Sector::create([
    		"sector"=>"División de Comunidades Educativas y Unión con el Pueblo",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector División de Comunidades Educativas y Unión con el Pueblo*/
    	/*start agregamos el sector Coordinación de Administración*/
    	Sector::create([
    		"sector"=>"Coordinación de Administración",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector Coordinación de Administración*/
    	/*start agregamos el sector Oficina de Planificación y Presupuesto*/
    	Sector::create([
    		"sector"=>"Oficina de Planificación y Presupuesto",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Oficina de Planificación y Presupuesto*/
    	/*start agregamos el sector Coordinación de Defensoría y Orientación Educativa*/
    	Sector::create([
    		"sector"=>"Coordinación de Defensoría y Orientación Educativa",
    		"letter_code"=>"d"
    	]);
    	/*end agregamos el sector Coordinación de Defensoría y Orientación Educativa*/
    	/*start agregamos el sector Oficina OPSU*/
    	Sector::create([
    		"sector"=>"Oficina OPSU",
    		"letter_code"=>"e"
    	]);
    	/*end agregamos el sector Oficina OPSU*/
    	/*start agregamos el sector Coordinación de Participación Estudiantil*/
    	Sector::create([
    		"sector"=>"Coordinación de Participación Estudiantil",
    		"letter_code"=>"f"
    	]);
    	/*end agregamos el sector Coordinación de Participación Estudiantil*/
    	/*start agregamos el sector Coordinación del Programa Todas las Manos a la Siembra*/
    	Sector::create([
    		"sector"=>"Coordinación del Programa Todas las Manos a la Siembra",
    		"letter_code"=>"g"
    	]);
    	/*end agregamos el sector Coordinación del Programa Todas las Manos a la Siembra*/
    	/*start agregamos el sector Centro de Reproducción, Impresión y Copiado*/
    	Sector::create([
    		"sector"=>"Centro de Reproducción, Impresión y Copiado",
    		"letter_code"=>"h"
    	]);
    	/*end agregamos el sector Centro de Reproducción, Impresión y Copiado*/
    	/*start agregamos el sector Despacho*/
    	Sector::create([
    		"sector"=>"Despacho",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector Despacho*/
    	/*start agregamos el sector Asistente del Despacho*/
    	Sector::create([
    		"sector"=>"Asistente del Despacho",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector Asistente del Despacho*/
    	/*start agregamos el sector Sala Situacional*/
    	Sector::create([
    		"sector"=>"Sala Situacional",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Sala Situacional*/
    	/*start agregamos el sector Sala Video Conferencia*/
    	Sector::create([
    		"sector"=>"Sala Video Conferencia",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector Sala Video Conferencia*/
    	/*start agregamos el sector FUNDABIT*/
    	Sector::create([
    		"sector"=>"FUNDABIT",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector FUNDABIT*/
    	/*start agregamos el sector Informática*/
    	Sector::create([
    		"sector"=>"Informática",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Informática*/
    	/*start agregamos el sector Prensa*/
    	Sector::create([
    		"sector"=>"Prensa",
    		"letter_code"=>"d"
    	]);
    	/*end agregamos el sector Prensa*/
    	/*start agregamos el sector División de Instalaciones y Logística*/
    	Sector::create([
    		"sector"=>"División de Instalaciones y Logística",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector División de Instalaciones y Logística*/
    	/*start agregamos el sector Coordinación de Seguridad*/
    	Sector::create([
    		"sector"=>"Coordinación de Seguridad",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector Coordinación de Seguridad*/
    	/*start agregamos el sector Coordinación de Instalaciones*/
    	Sector::create([
    		"sector"=>"Coordinación de Instalaciones",
    		"letter_code"=>"c"
    	]);
    	/*end agregamos el sector Coordinación de Instalaciones*/
    	/*start agregamos el sector Coordinación de Logística*/
    	Sector::create([
    		"sector"=>"Coordinación de Logística",
    		"letter_code"=>"d"
    	]);
    	/*end agregamos el sector Coordinación de Logística*/
    	/*start agregamos el sector Coordinación de Protección Socio-Económica y Salud*/
    	Sector::create([
    		"sector"=>"Coordinación de Protección Socio-Económica y Salud",
    		"letter_code"=>"e"
    	]);
    	/*end agregamos el sector Coordinación de Protección Socio-Económica y Salud*/
    	/*start agregamos el sector Coordinación de Cultura*/
    	Sector::create([
    		"sector"=>"Coordinación de Cultura",
    		"letter_code"=>"e"
    	]);
    	/*end agregamos el sector Coordinación de Cultura*/
    	/*start agregamos el sector Archivo*/
    	Sector::create([
    		"sector"=>"Archivo",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector Archivo*/
    	/*start agregamos el sector Coordinación de Consultoría Jurídica*/
    	Sector::create([
    		"sector"=>"Coordinación de Consultoría Jurídica",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector Coordinación de Consultoría Jurídica*/
    	/*start agregamos el sector División de Investigación y Formación Docente*/
    	Sector::create([
    		"sector"=>"División de Investigación y Formación Docente",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector División de Investigación y Formación Docente*/
    	/*start agregamos el sector Oficina de Misión Robinson*/
    	Sector::create([
    		"sector"=>"Oficina de Misión Robinson",
    		"letter_code"=>"a"
    	]);
    	/*end agregamos el sector Oficina de Misión Robinson*/
    	/*start agregamos el sector Archivo de Auditoria Interna*/
    	Sector::create([
    		"sector"=>"Archivo de Auditoria Interna",
    		"letter_code"=>"b"
    	]);
    	/*end agregamos el sector Archivo de Auditoria Interna*/
    }
    /*end creamos los sectores de la zona educativa*/
}
