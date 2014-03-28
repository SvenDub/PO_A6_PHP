Gebruikershandleiding website
===
Via de URL (http://86.95.155.194/po_kassa/product/index.php) komt u op de website.

De website kunt u doormiddel van ftp uploaden en in phpmyadmin moet dan het .sql bestand worden ingeladen.

U bevindt zich nu op de homepage. Wanneer u links in het menu op 'Inloggen' klikt, wordt u doorverwezen naar de inlogpagina. U kunt nu weer terug naar de homepage door in het keuzemenu op ‘Home’ te klikken. 

Hier kan al het personeel inloggen met zijn gebruikersgegevens. Wanneer u correct inlogt met uw gebruikersgegevens, krijgt u de melding ‘Welkom op de inlogpagina’.
Wanneer u nu teruggaat naar ‘Home’, kunt u beginnen met het gebruiken van de website. U ziet dan de onderstaande pagina:

![Hoofdscherm][https://github.com/SvenDub/PO_A6_PHP/raw/master/docs/Gebruikershandleiding-1.png]

Het verschillende personeel heeft verschillende functies tot beschikking. Op die manier wordt er onderscheid gemaakt tussen beheerders en ’normaal’ personeel. De bovenstaande screenshot toont alle functies voor een beheerder, gewoon personeel ziet alleen de opties ‘Home’, ‘Uitloggen’ en  ‘Bestellingen’.

**Uitloggen:** de gebruiker logt uit en komt weer op de inlogpagina terecht, waardoor er eventueel een nieuwe gebruiker kan inloggen.

**Bestellingen:** deze pagina wordt ook wel de ‘liveticker’ genoemd: hier worden alle bestellingen op weergegeven. Wanneer een ober via de app een bestelling opneemt, verschijnt deze in de keuken op dit scherm. De liveticker ververst zichzelf automatisch. Op het moment dat een bestelling op de liveticker verschijnt, kan de keuken de bestelling gaan klaarmaken. Wanneer de bestelling gereed staat, kan één van de koks dit aangeven door op ‘Gerecht is klaar’ te klikken. De obers krijgen op dan een melding dat het gerecht klaar is en dat ze het op kunnen halen, zodat het snel bij de wachtende klant terugkomt.

**Statistieken:** hier kan een beheerder verschillende statistieken van het restaurant bekijken.
	- *Klanten per periode:* voor verschillende tijdsgroottes is het aantal klanten weergegeven. Het getal geeft het absolute aantal weer, door de grafiek kunnen bezoekersstijgingen en –dalingen snel worden gespot.
	- *Omzet per periode:* hiervoor geldt hetzelfde als bij Klanten per periode. Hier gaat het echter om de omzet en niet om het aantal klanten.
	- *Totaal aantal klanten:* hier wordt weergegeven hoeveel klanten er in totaal zijn geweest sinds het begin van de metingen (bijv. de opening van het restaurant).
	- *Totale omzet:* hier wordt de totale omzet die in het restaurant is gedraaid weergegeven, sinds het begin van de metingen.
	- *Gemiddelde omzet per klant:* dit geeft weer hoeveel een klant gemiddeld heeft uitgegeven in het restaurant.

**Beheer:** hier kan de database worden beheerd. Er zijn verschillende wijzigingen die een beheerder kan doen:
	- *Product toevoegen:* kies de categorie waarbinnen het product valt, voer de naam en de prijs van het gerecht in en kies ervoor of deze nu al op de menukaart moet verschijnen of dat het product nog verborgen met blijven. Dit kan door bij ‘Actief’ een 0 (niet-actief) of een 1 (wel actief) te kiezen.
	- *Tafelnummer toevoegen:* voeg een tafel toe
	- *Categorie toevoegen:* kies een categorienummer en vul de naam van de nieuwe categorie in. Voorbeelden van categorieën zijn ‘Drank’ en ‘Hoofdgerechten’.
	- *Personeel wijzigen:* hier kunnen de (inlog)gegevens van gebruikers worden gewijzigd. De gebruiker kan worden geselecteerd en vervolgens kunnen zijn nieuwe inloggegevens worden ingevoerd. Ook kan worden aangegeven of deze gebruiker wel (1) of (0) geen beheerder is en of deze wel (1) of niet (0) actief is. Een voorbeeld van een niet-actieve gebruiker is een ober die nu niet meer in het restaurant werkt.
	- *Product wijzigen:* kies het product waarvan je één of meerdere gegevens wilt wijzigen. Selecteer vervolgens de (eventueel nieuwe) categorie, naam en prijs van het product en geef aan of dit product wel (1) of niet (0) moet worden weergegeven op de menukaart (dus actief). 
	- *Tafelnummer wijzigen:* selecteer het oude tafelnummer en voer het nieuwe nummer van deze tafel in. 
	- *Categorie wijzigen:* kies de categorie die je wilt wijzigen en voer de nieuwe naam van deze categorie in. 
	- *Tafelnummer verwijderen:* selecteer een tafelnummer dat overbodig is en klik op verzenden om het tafelnummer te verwijderen.
	- *Gebruiker toevoegen:* hier kan een nieuwe gebruiker worden toegevoegd aan het systeem. Vul eerst de gewenste gebruikersnaam en het wachtwoord in en geef aan of deze gebruiker wel (1) of geen (0) beheerder moet worden en of deze wel (1) of niet (0) actief is.

Gebruikershandleiding app
===
Uit de Google Play Store kunt u de applicatie voor het kassasysteem downloaden.

Op het moment dat u de app gedownload hebt en voor het eerst de app start, dan zult u dit scherm krijgen:

![Inlogscherm][https://github.com/SvenDub/PO_A6_PHP/raw/master/docs/Gebruikershandleiding-2.png]

Hier moet u de url van de server, uw gebruikersnaam en uw wachtwoord invullen in de hiervoor bestemde vakjes. Vervolgens drukt u op inloggen. Het systeem zal uw gegevens verifiëren en zal u daarna inloggen. 

U krijgt vervolgens na het inloggen het hoofdscherm van de applicatie waar de tafels van het restaurant staan. Als u de applicatie afsluit, worden uw inloggegevens bewaard. Als u de app opnieuw opstart krijgt u dus altijd het hoofdscherm. Als u uitlogt, krijgt u weer het inlogscherm te zien. 

Dit is het hoofdscherm van de app:

![Hoofdscherm][https://github.com/SvenDub/PO_A6_PHP/raw/master/docs/Gebruikershandleiding-3.png]

In de Action Bar ziet u een ververs knop en het action overflow.  Bij tafel 1 en 2 zijn de tafels op dit moment bezet, dat ziet u aan het icoontje.

Op het moment dat u een nieuwe tafel wilt activeren doordat er nieuwe gasten bij zijn gekomen, drukt u op een vrije tafel. U krijgt dan dit scherm te zien:

![Beheer Tafel scherm][https://github.com/SvenDub/PO_A6_PHP/raw/master/docs/Gebruikershandleiding-4.png]

U ziet hier in de Action Bar een beheerknop, als u daar op drukt komt er een pop up met een knop activeren. Als u vervolgens op activeren klikt, vraagt de app aan u hoeveel personen u aan deze tafel wilt laten eten in restaurant de Bolhoed. De tafel is op dat moment geactiveerd.

U kunt dan na deze activatie op de gerechten klikken in de menulijst. Op de afbeelding hierboven staat de menulijst open op de hoofdgerechten. U klikt dan op een gerecht, u krijgt pop up te zien waarin het aantal wordt gevraagd en u kunt dan een opmerking toevoegen bij de bestelling van dit gerecht.

![Bestellijst][https://github.com/SvenDub/PO_A6_PHP/raw/master/docs/Gebruikershandleiding-5.png]

De bestelling komt vervolgens in de bestellijst van de tafel. Hier ziet u een afbeelding met bestelling voor Crêpe soleil. De bestelling is 2x opgenomen en het product is dan totaal 12 euro. Dus 1 Crêpe soleil is 6 euro. U kunt ook op de bestelling klikken om de bestelling te wijzigen. 
Op het moment dat de keuken de bestelling klaar heeft, krijgt de ober die de bestelling heeft aangemaakt een notificatie.

U kunt bij een geactiveerde tafel op beheren klikken om de tafel te deactiveren en het verschuldigde bedrag te laten betalen. U kunt tevens op de beheerknop klikken om het aantal gasten aan te laten passen.
