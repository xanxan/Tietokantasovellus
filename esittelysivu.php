Tietokantasovellus –harjoitustyö<!DOCTYPE html>
<html>
  <head>
    <title>Tietokantasovellus</title>
    <meta charset="utf-8" />
    <style>
      h1 { font-size: 1.4em; }
      h2 { font-size: 1.1em; }
    </style>
  </head>
  <body>
    <h1>Tietokantasovelluksen esittelysivu</h1>
    <p>Yleisiä linkkejä</p>
    <ul>
      <!-- Korvaa ohessa olevat sanat GITHUBTUNNUS ja 
           REPOSITORIO omilla tiedoillasi: -->
      <li><a href="https://github.com/xanxan/Tietokantasovellus">Työn repositorio</a></li>
      <li><a href="https://github.com/xanxan/Tietokantasovellus/blob/master/doc/dokumentaatio.pdf?raw=true">Työn dokumentaatio</a></li>

      <!-- Viikolla 2 voit laittaa kommentoidut linkitkin sivuille. 
           Ota kommenttimerkit pois sen kielen ympäriltä, jota käytät -->

      <!-- Linkit Java-kielelle.
           Korvaa sana cstunnus omalla tktl-tunnuksellasi ja sana 
           Tietokantasovellus tietokantasovelluksesi usersille 
           pystytetyllä nimellä: 
      -->
      <!--
      <li><a href="http://t-cstunnus.users.cs.helsinki.fi/ConnectionTest">Connectiontest-ohjelma</a></li>
      <li><a href="http://t-cstunnus.users.cs.helsinki.fi/Tietokantasovellus/html-demo/index.jsp">HTML-demosivujen etusivu</a></li>
      <li><a href="http://t-cstunnus.users.cs.helsinki.fi/Tietokantasovellus/Listaustesti">Ensimmäinen oma tietokantalistaus</a></li>
      -->
      <!-- Linkit PHP-kielelle.
           Korvaa sana cstunnus omalla tktl-tunnuksellasi ja sana 
           Tietokantasovellus sen hakemiston nimellä, missä 
           sovelluksesi usersin htdocs-kansiossa sijaitsee:
      -->
      
      <li><a href="http://xanxan.users.cs.helsinki.fi/connectiontest.php">Connectiontest-ohjelma</a></li>
      <li><a href="http://xanxan.users.cs.helsinki.fi/html-demo/Etusivu.html">HTML-demosivujen etusivu</a></li>
      <li><a href="http://xanxan.users.cs.helsinki.fi/libs/tietokantatesti.php">Ensimmäinen oma tietokantalistaus</a></li>
      
      
      <!-- Viikolla 3 laita alla kommentoitu linkki osoittamaan omaan kirjautumissivuusi. -->
      
      <li><a href="http://xanxan.users.cs.helsinki.fi/login.php">Sovelluksen kirjautumissivu</a></li>
      
    </ul>

    <h2>Työn aihe</h2>
     Tietokantasovelluksena toteutetaan www-sivuilla toimiva ravintolatietokanta.  Ravintolatietokannan käyttäjät voivat etsiä sovelluksella mieleistään ravintolaa Helsingin alueelta ja selailla listaa ravintoloista. 

    
    <h2>Kirjautumistunnuksia testausta varten</h2>

    
    Pääkäyttäjän tunnus ja salasana:<br /> admin, test
    <br />  Tavallisen käyttäjän tunnus ja salasana:<br /> framboise, minni
    </p>
   

   Päivitys tilanteesta: Kayttajat -taulun crud toiminnot ovat nyt valmiina, eli ohjelma näyttää kaikki käyttäjät listassa, lisää uuden käyttäjän kantaan rekisteröimisen yhteydessä, päivittää käyttäjän tiedot ja halutessa poistaa käyttäjätunnuksen. Tällä hetkellä työn alla on adminin oikeudet lisätä, muokata ja poistaa ravintoloita sekä ravintolan listanäkymä. Ps. päivityssivulla sen verran vikaa että päivittäessä käyttäjän nimen näyttäminen ei toimi (Call to a member function getTunnus() on a non-object) vaikka olen tota yrittänyt korjata mikä siinä mättää. Virhe korjataan mahdollisimman pian.
  </body>
</html>
