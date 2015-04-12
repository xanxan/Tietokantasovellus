
   create table Ravintolat(
	id serial,
        aukioloajat varchar(30) not null,
	arvosteluja integer not null,
        hintataso varchar(5) not null,
        inhokki integer not null,
        kommentteja integer not null,
        kuva varchar(100) not null,
        kuvaus varchar(300) not null,
        nimi varchar(20) not null,
        osoite varchar(100) not null,
        suosikki integer not null,
        tyyppi varchar(20) not null,
        primary key (id)
    );

    create table Kayttajat (
        arvosteluja integer not null,
        inhokkeja integer not null,
        kommentteja integer not null,
        kuva varchar(100) not null,
        kuvaus varchar(300) not null,
        liittymispaiva date not null,
        salasana varchar(15) not null,
        suosikkeja integer not null,
        tunnus varchar(10) not null,
        id serial,
        primary key (id)
    );

    create table Arvostelut (
        arvostelija_id integer references kayttajat(id) not null,
        arvostelijatunnus varchar(10) not null,
        arvostelupv date not null,
        hintaLaatu integer,
        juomatarjonta integer,
        palvelu integer,
        ravintola_id integer references ravintolat(id) not null,
        ravintolanimi varchar(20) not null,
        ruoka integer,
        yleisarvio integer not null,
        primary key(arvostelija_id, ravintola_id)
   );

   create table inhokkilista (
        kayttaja_id integer references kayttajat(id) not null,
        ravintola_id integer references ravintolat (id)not null,
        primary key (kayttaja_id, ravintola_id)
    );

    create table kommentit (
        kayttaja_id integer references kayttajat(id) not null,
        kayttajatunnus varchar(10) not null,
        kommentti varchar(300) not null,
        ravintola_id integer references ravintolat(id) not null,
        ravintolannimi varchar(20) not null,
        primary key (kayttaja_id, ravintola_id)
    );

    create table sopivuustiedot (
        aamiainenBrunssi boolean not null,
        anniskeluoikeus boolean not null,
        buffet boolean not null,
        k18 boolean not null,
        kasvissyojat boolean not null,
        lapsiperheet boolean not null,
        lounas boolean not null,
        pukupakko boolean not null,
        ravintola varchar(20) not null,
        ravintola_id integer references ravintolat(id) not null,
        varauspakko boolean not null,
        vegaanit boolean not null,
        primary key (ravintola_id)
    );

    create table suosikkilista (
        kayttaja_id integer references kayttajat(id) not null,
        ravintola_id integer references ravintolat(id) not null,
        primary key (kayttaja_id, ravintola_id)
    );

    create table yllapitajat (
        kayttaja_id integer references kayttajat(id) not null,
        kayttajatunnus varchar(20) not null,
        primary key (kayttaja_id)
    );

   
