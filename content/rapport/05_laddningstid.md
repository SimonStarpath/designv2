---
---
Rapport kmom05 - laddningstid
=========================

Uppgiften handlar om att göra performansanalys på några webbplatser, speciellt med avseende på resursanvändining, laddningstid och sidstorlek.

Urval
-----------------------
Jag bestämde mig för att använda mig av samma webbplatser som jag tidigare undersökte i förra kmom, tyckte det skulle vara kul att till "design"-analysen som gjordes i förra kmom lägga motsvarande "tekniska" analys, så de bildar en helhet i slutändan.

Listan såsom tidigare:

- Sony Mobile: min arbetsgivare
- Sweden Rock: festivalen som är något av en fastpunkt varje år, musiken jag älskar
- Axel Scheffler: barnboksillustratör som skapar väldigt charmiga karaktärer

Metod
-----------------------
Jag inleder min analys med att låta verktyget <a href="https://developers.google.com/speed/pagespeed/insights/">Google Pagespeed</a> analysera och betygsätta varje webbplats. Därefter använder jag verktyget <a href="https://developers.google.com/web/tools/lighthouse">Lighthouse</a> för att få fram faktiska siffror på laddningstid, sidstorlek och antal resurser dels på landing-sidan för varje webbplats, dels på två undersidor för varje webbplats. För varje sida körs verktyget 3 gånger för att få ett genomsnittligt värde för nämnda variabler. Har försökt att välja undersidor så de har samma (typ av) innehåll för att sedan kunna göra en någorlunda rättvis jämförelse mellan webbplatserna. Datat som utkommer från körningarna samlas och finns tillgängliga online i ett kalkylark som tillhandahålls av <a href="https://www.google.com/sheets/about/">Google Sheets</a>.

Testerna utförs från min bärbara dator, över ett WiFi-nätverk. Mätningarna i Lighthouse har gjorts med inställningen 'Applied 4G, 4xCPU Slowdown, Desktop', några har även gjorts med 'No throttling, Desktop' för referens. Rådatat har samlats i denna <a href="https://docs.google.com/spreadsheets/d/1GayflhqBfuRsEjMyEW98BlXSVCXJYVG8WMUcdocDvJo/edit?usp=sharing">filen</a>, observera att den innehåller 2 flikar.

Resultat
-----------------------
###<a href="http://sonymobile.com">1. Sony Mobile</a>
[FIGURE src=image/sony.jpg?w=300]
[FIGURE src=image/Sony_Mobile.png?w=700]

<table style="width:100%">
  <tr>
    <th>Webbsida</th>
    <th>laddningstid(snittvärde)</th>
    <th>Antal resurser</th>
    <th>Sidstorlek</th>
  </tr>
  <tr>
    <td>https://www.sonymobile.com/se/</td>
    <td>2.4s</td>
    <td>111</td>
    <td>6.7MB</td>
  </tr>
  <tr>
  <td>/products/phones/xperia-5/</td>
  <td>1.5s</td>
  <td>120</td>
  <td>9.4MB</td>
  </tr>
  <tr>
  <td>/products/phones/</td>
  <td>7.5s</td>
  <td>111</td>
  <td>7.0MB</td>
  </tr>
</table>

Betyget från Pagespeed blir 64 (av 100) för datorkörning, vilket är relativt acceptabelt, men för mobilkörningen endast 6 (av 100), vilket får betraktas som riktigt lågt. Tittar man på tidsintervallen för de mätta variablerna (första uppritningen, första meningsfulla skärmuppritningen, mm) så ligger de på 1-3 sekunder för dator, men på 7-12 sekunder för mobil, det är alltså inte så konstigt med det låga betyget. Även ovan tabell från Lighthouse visar på att något inte är bra, sidorna gör mer än 100 anrop för resurser per sida. Sista sidan tar mer än 7 sekunder att visa, det verka bero på att många av de requestade resurserna är bilder.

Pagespeed föreslår följande primära förbättringsmöjligheter:
- ta bort oanvänd CSS
- minska belastningen på huvudtråden genom att minska storleken på JS-resurserna
- minska storlekten på DOM-trädet

Jag misstänker att anledningen till "långsamheten" är att koncernen Sony består av många företag och vill att varje enskilt företag använder samma färdiga formatmallar (CSS, JS, ..) för att säkerställa att alla ingående företagens webbplatser har samma look-and-feel, vilket resulterar till mycket konstruktioner som aldrig används för de enskilda webbplatserna.

###<a href="http://swedenrock.com">2. Sweden Rock</a>
[FIGURE src=image/swedenrock.jpg?w=300]
[FIGURE src=image/Sweden_Rock.png?w=700]

<table style="width:100%">
  <tr>
    <th>Webbsida</th>
    <th>laddningstid(snittvärde)</th>
    <th>Antal resurser</th>
    <th>Sidstorlek</th>
  </tr>
  <tr>
    <td>https://www.swedenrock.com/</td>
    <td>0.75s</td>
    <td>70</td>
    <td>1.6MB</td>
  </tr>
  <tr>
  <td>/festival/artister/sweden-rock-2020/</td>
  <td>1.2s</td>
  <td>63</td>
  <td>1.4MB</td>
  </tr>
  <tr>
  <td>/enskild-bandpresentation&id=1845&_blhc=1/</td>
  <td>2.4s</td>
  <td>111</td>
  <td>6.7MB</td>
  </tr>
</table>

Betyget från Pagespeed blir 91 (av 100) för datorkörning, vilket är riktigt bra, men för mobilkörningen 56 (av 100), viket är att betrakta som OK. Tittar man på tidsintervallen för de mätta variablerna (första uppritningen, första meningsfulla skärmuppritningen, mm) så ligger de på 1-1.5 sekunder för dator, men på 4-7 sekunder för mobil. Tabellen från Lighthouse visar på att det överlag är bra laddningstider, återigen är det sidan med mer än 100 anrop för resurser per sida som sticker ut negativt, det verka bero på att många av de requestade resurserna är videor(YouTube)/previews/foton, flertalet från från tredjepart.

Pagespeed föreslår följande primära förbättringsmöjligheter:
- ta bort resurser som blockerar renderingen (infoga JS/CSS-kod direkt i sidan, skjut upp inläsning av JS/CSS som är mindre viktiga)
- minska påverkan från tredjepartskod (i detta fall handlar det om YouTube-videor, Facebook, Cloudflare, FontAwesome)

###<a href="https://axelscheffler.com/">4. Axel Scheffler</a>
[FIGURE src=image/Axel_Scheffler.png?w=700]

<table style="width:100%">
  <tr>
    <th>Webbsida</th>
    <th>laddningstid(snittvärde)</th>
    <th>Antal resurser</th>
    <th>Sidstorlek</th>
  </tr>
  <tr>
    <td>https://axelscheffler.com/</td>
    <td>0.6s</td>
    <td>24</td>
    <td>1.9MB</td>
  </tr>
  <tr>
  <td>/books/</td>
  <td>2.0s</td>
  <td>89</td>
  <td>3.7MB</td>
  </tr>
  <tr>
  <td>/enskild-bandpresentation&id=1845&_blhc=1/</td>
  <td>0.6s</td>
  <td>25</td>
  <td>1.3MB</td>
  </tr>
</table>

Betyget från Pagespeed blir 99 (av 100) för datorkörning och för mobilkörningen 95 (av 100), viket är så bra som det kan överhuvudtaget vara. Tittar man på tidsintervallen för de mätta variablerna (första uppritningen, första meningsfulla skärmuppritningen, mm) så ligger de på runt 0.7 sekunder för dator och runt 2.5 sekunder för mobil. Tabellen från Lighthouse bekräftar dessa laddningstider.

Det får anses att denna webbplats är välbyggd både vad gäller ur design/responsivitets synpunkt, vilket vi såg i föregående kmom, och ur teknisk synpunkt. Trots att antalet anrop närmar sig 100 för ena undersidan så är den ändå betydkigt snabbare att ladda, jämfört med motsvarande i tidigare undersökta webbplatser.

Analys
-----------------------
I min analys finner jag att antalet resurser som varje sida använder kan spela en viss roll i hur laddningstiden påverkas, men än viktigare är hur stora de resurser som efterfrågar är, rent praktiskt lönar sig det avsevärt att hålla exempelvis storlekten på bilder, foton och videor som läggs in på sidan. Det är lönsamt att hålla ner storleken på JS/CSS-filer som bygger upp sidan, exempelvis bör man rensa bort alla konstruktioner som inte används i den aktuella sidan om JS/CSS-filerna utgår från mallar; ett annat sätt ar att splitta dessa i midre filer som kombineras och används såsom behovet föreskriver vid tillfället.

Rangordning m.a.p laddningstid/snabbhet:

1. <a href="https://axelscheffler.com/">Axel Scheffler</a>
2. <a href="http://swedenrock.com">Sweden Rock</a>
3. <a href="http://sonymobile.com">Sony Mobile</a>

Jag skulle väl säga att jag kan acceptera en laddningstid på 2-3 sekunder per undersida för en webbplats och även uppemot 4-6 sekunder för någon enskild undersida i webbplatsen, speciellt om det innehåller information jag är intresserad av. Skulle det däremot ske vid "strösurfning" så skulle jag däremot bli mer otålig och lämna webbplatsen. Det innebär alltså att jag accepterar laddningstiderna för ovan webbplatser (tycker mycket om Sony Mobiles "sobra" grafik, så det är OK med en och annan långsam laddning).

Övrigt
-----------------------

Skriven av Simon Stjärnerstig och min grupp består av me, myself and I. :)
