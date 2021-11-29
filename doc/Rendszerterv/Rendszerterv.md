(http://aries.ektf.hu/~tajti/rft-afp/AFP_v2.pdf) 

## Rendszerterv

## 1. A rendszer célja
● Leírja hogy mit szeretne megoldani a rendszer.
● Példa: “A rendszer célja, hogy a felhasználó játékos körülmények között tud
tanulni, különböző feladatokat megoldani. A felhasználó pontszámokat kap
arról, hogyan sikerült megoldania a feladatokat. Fontos, hogy a felhasználó
könnyen el tudjon igazodni a felületeken ezért minimalista felhasználói
felületet kap a program. A tanár szerepkörrel rendelkező felhasználók
feltölthetnek feladatsorokat az adatbázisba. A rendszer használható
Androidos eszközökön, alkalmazás formájában, valamint webes felületen is
elérhető. A rendszer az adatokat egy Web Service segítségével kapja az
adatbázisból. Mivel az alkalmazást csak webes felületen, és Android
alkalmazásban szeretnénk elérhetővé tenni, nem célunk hogy más, például
IOS operációs rendszerrel rendelkező eszközön fusson. A felhasználó a
feladatsorok megoldása után pontszámokat kap. Teljesítményét a toplistán is
megtekintheti.”

## 2. Projektterv
● Leírja a szerepköröket ,kik vannak a csapatban és min dolgoznak. Ide
kerül az ütemterv és általában mérföldköveket tartalmaz.
● Példa: ”
Projektszerepkörök, felelőségek:
Scrum master: Kiss Jenő
Product owner: Nagy Béla
Projektmunkások és felelőségek:
Backend munkálatok: (csapat tagjai)
Feladatuk az adatok tárolásához szükséges adatszerkezetek kialakítása,
funkciók létrehozása, a különböző platformok kiszolgálása adatokkal.
Ütemterv:

| Funkció / Story  | Feladat / Task | Prioritás | becslés | Aktuális becslés | Eltelt idő | Hátralévő idő|
| ------------- | ------------- | ------------- | ------------- | ------------- | ------------- | ------------- |
| Követelmény specifikáció | 0 | 12 | 12 | 12 | 0 |
| Funkcionális specifikáció | 0 | 12 | 12 | 12 | 0 |
| Rendszerterv | 0 | 16 | 16 | 8 | 8 |
|  Adattárolás | Adatmodell megtervezése | 0 | 4 | 4 | 4 | 0 |
| | Adatbázis megvalósítása a szerveren | 1 | 1 | 1 | 0 | 1 |
| Login felület | Logó elkészítése | 2 | 8 | 8 | 0 | 8 |

![Image](7. Igényelt üzleti folyamatok.png)

Mérföldkövek: Az adatmodell bemutatása megtörtént.”


## 3. Üzleti folyamatok modellje
● Példa:![Image](3. Üzleti folyamatok modellje.png)

## 4. Követelmények
● Leírja nagyvonalakban miket kell teljesítenie a programnak.
● Példa: “Funkcionális követelmények:
o Felhasználók adatainak tárolása.
o Felhasználók csoportokba szervezése.
o Androidon és webes környezeten való működés.
Nem funkcionális követelmények:
o A felhasználók nem juthatnak hozzá más felhasználók személyes adataihoz a
nevükön és azonosítóikon kívül.
Törvényi előírások, szabványok:
o GDPR-nek való megfelelés.”

## 5. Funkcionális terv
● Leírja a felhasználói szerepköröket, és hogy milyen feladatokat
tudnak csinálni.
● Példa:”
Rendszerszereplők:
Admin
Diák
Rendszerhasználati esetek és lefutásaik:
ADMIN:
● Beléphet bármilyen szereplőként teljes hozzáférése van a rendszerhez
● A felhasználói adatokat látják, változtathatják
● Felhasználó hozzáadására, törlésére van lehetőségük
● Feladatlétrehozás mint a Tanárok
● Diákok jegymódosítása
● Üzenetküldés bárkinek vagy globálisan
● Felhasználói adatok módosítása
● Tesztek létrehozása, törlése, módosítása
● Kvízek létrehozása, törlése, módosítása
DIÁK:
● Képes kvízt kitölteni, aminek végén pontot szerez
● Képes üzenetet küldeni más diákoknak, tanároknak vagy diákoknak
● El tudja érni az órarendjét
● Teszt felület elérése, ami egy kvízhez hasonló felület ahol
eredményjegyet szerezhet a diák.
Menü-hierarchiák:
● BEJELENTKEZÉS
o Bejelentkezés
o Regisztráció
o Help
● MAIN MENÜ
o Kvíz
o Feladatlétrehozás (Tanároknak)
o Órarend megtekintés (Diákoknak)
o E-naplo elérése
o Személyes adatok
o Toplist
o Kijelentkezés”

## 6. Fizikai környezet
● Itt kell leírni milyen platformra készül a szoftver ,mik vannak engedélyezve és
milyen fejlesztői eszközöket / programokat használunk fejlesztés közben.
● Példa:”
● Az alkalmazás Android és web platformra, hordozható
eszközökre(okostelefonok,táblagépek) készül.
● Van tűzfal a hálózaton és minden portot is engedélyez.
● Nincsenek megvásárolt komponenseink.
● Fejlesztői eszközök:
o Notepad++
o Gradle
o MySQL Workbench
o Lumen Framework”

## 7. Absztrakt domain modell
●

## 8. Architekturális terv
● Példa: “Backend:
A rendszerhez szükség van egy adatbázis szerverre, ebben az esetben
MySql-t használunk. A kliens oldali programokat egy php alapú REST api
szolgálja ki, ez csatlakozik az adatbázis szerverhez. A kliensekkel JSON
objektumokkal kommunikál.
Web Kliens:
A web alkalmazás Angular JS keretrendszer használatával készül el.A rest
api-hoz a user belépését követően egyedi api-key segítségével lehet
hozzáférni, ez biztosítja, hogy illetéktelen felhasználók ne módosíthassák az
adatokat. ”

## 9. Adatbázis terv
● Példa:![Image](9. Adatbázis terv.png)

## 10.Implementációs terv
● Leírja milyen technológiákat használunk hogyan és miért.
● Példa:”
Web:
A Webes felület főként HTML, CSS, és Javascript nyelven fog készülni.
Ezeket a technológiákat amennyire csak lehet külön fájlokba írva készítjük, és
úgy fogjuk egymáshoz csatolni a jobb átláthatóság, könnyebb változtathatóság,
és könnyebb bővítés érdekében. Képes lesz felhasználni a Backend részen futó
REST szolgáltatás metódusait, ezáltal tud felvinni és lekérdezni adatokat az
adatbázisból. Az eltelt időt a kliens fogja számolni a feladatoknál, hogy ne
legyenek eltérések.”

## 11.Tesztterv
● Leírja a tesztelés folyamatát mikor milyen tesztek lesznek elvégezve.
● Példa:” A tesztelések célja a rendszer és komponensei funkcionalitásának
teljes vizsgálata, ellenőrzése, a rendszer által megvalósított üzleti
szolgáltatások verifikálása.
Tesztelési eljárások
Unit teszt:
Ahol csak lehetséges, szükséges már a fejlesztési idő alatt is tesztelni, hogy a
metódusok megfelelően működnek-e.
Ezért a metódusok megfelelő működésének biztosítására mindegyikhez írni
kell Unit teszteket, a minél nagyobb kódlefedettséget szem előtt tartva. A
metódusok akkor vannak kész, ha a tesztesetek hiba nélkül lefutnak az egyes
metódusokon.
Alfa teszt:
A teszt elsődleges célja: az eddig meglévő funkcióknak a különböző
böngészőkkel, és androidokkal való kompatibilitásának tesztelése. A tesztet a
fejlesztők végzik.
Az eljárás sikeres, ha különböző böngészőkben és különböző androidokon is
megfelelően működnek a különböző funkciók. A teszt időtartama egy hét.
Beta teszt:
Ezt a tesztet nem a fejlesztők végzik.
Tesztelendő böngészők: Opera, Firefox, Google Chrome, Safari
Tesztelendő android rendszerek:6.0.0(minimum), vagy újabbak
Tesztelendő kijelző méretek: 1280x720 (minimum), 1366x768, 1920x1080
A teszt időtartama egy hét.
A tesztelés alatt a tesztelő felhasználók visszajelzéseket küldhetnek a
fejlesztőknek, probléma/hiba felmerülése esetén.
Ha hiba lép fel, a fejlesztők kijavítják a lehető leghamarabb. Sok hiba esetén
a tesztelés ideje elhúzódhat plusz egy héttel.
Tesztelendő funkciók
Backend Service
Képesnek kell lennie csatlakozni webes, és androidos klienshez is.
Képesnek kell lennie egy időben kiszolgálni több klienst is.
Fel kell tudnia tölteni, és le kell tudnia kérdezni az adatbázis adatait.
Képesnek kell lennie minden felületen elérhető funkciók biztosítására.
Android
Login felület:
A login/regisztrációs felület elrendezésének ellenőrzése: Elvárt működés: a
funkcionális specifikációban szereplő képernyőtervnek megfelelően kell
kinéznie, a képernyő méretétől függetlenül.
Regisztrációs felület:
A regisztrációs felületnek elérhetőnek kell lennie a program telepítés után a
kezdőképernyőn a bejelentkezési lehetőség mellett. Amennyiben a
felhasználó még nincs regisztrálva az itt található gombra kattintva kell
átirányítani a regisztrációs felületre. Ezen felületen a megfelelő adatok
megadása mellett a megerősítés gombra kattintva a felhasználó
regisztrációjának a funkcionális specifikációban leírtak szerint végbe kell
mennie, majd elérhetővé kell tenni a bejelentkezést a felhasználó számára.
Hibás regisztrációs adatok megadásakor hibaüzenetet kell kapjon a
felhasználó.”

## 12.Telepítési terv
● Leírja hogyan kell telepíteni a programot.
● Példa: “Androidos alkalmazás
○ Töltse le az alkalmazást a Google áruházból, adja meg a szükséges
engedélyeket és telepítse a programot!
○ Amennyiben nem az áruházból kívánja telepíteni az alkalmazást, úgy
engedélyezze készülékén az úgynevezett "Harmadik féltől származó
tartalmakat" a beállításoknál!
○ Helyezze az ".apk" kiterjesztésű elemet a készülékére, majd futtassa
azt!
● Webes alkalmazás
○ A szoftver webes felületéhez csak egy ajánlott böngésző telepítése
szükséges (Google Chrome, Firefox, Opera, Safari), külön szoftver
nem kell hozzá. A webszerverre közvetlenül az internetről
kapcsolódnak rá a kliensek.

## 13.Karbantartási terv
● Példa: “Az alkalmazás folyamatos üzemeltetése és karbantartása, mely
magában foglalja a programhibák elhárítását, a belső igények változása miatti
módosításokat, valamint a környezeti feltételek változása miatt
megfogalmazott program-, illetve állomány módosítási igényeket. Ellenőrizni
kell, hogy a jövőben kiadott Android verziókkal kompatibilis-e az alkalmazás.
Idő elteltével új kategóriákat kell hozzáadni a játékhoz, hogy fent tartsuk az
érdeklődési szintet.
Karbantartás
Corrective Maintenance: A felhasználók által felfedezett és "user reportban"
elküldött hibák kijavítása.
Adaptive Maintenance: A program naprakészen tartása és finomhangolása.
Perfective Maintenance: A szoftver hosszútávú használata érdekében végzett
módosítások, új funkciók, a szoftver teljesítményének és működési
megbízhatóságának javítása.
Preventive Maintenance: Olyan problémák elhárítása, amelyek még nem
tűnnek fontosnak, de később komoly problémákat okozhatnak.