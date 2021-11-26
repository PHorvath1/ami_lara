(http://aries.ektf.hu/~tajti/rft-afp/AFP_v2.pdf)

## Követelmény Specifikáció

## 1. Áttekintés
● Ebben a fejezetben röviden ismertetni kell a projektünk egészét. Milyen
technológiákat szeretnénk alkalmazni, hogyan fog működni az
alkalmazásunk stb.
● Példa: “Az alkalmazás célja játékos módú iskolai tanulmányokat
kiegészítő tanulási lehetőség biztosítása általános iskolásoknak. Az
alkalmazás rendelkezik Web és Android felülettel, mindkettő módon
elérhető az összes felhasználói funkció. A tananyagok tantárgyak, azon
belül pedig témakörök szerint vannak osztályozva. A témakörökben a
diákok tananyagot és ahhoz tartozó teszteket (kiegészítős,
feleletválasztós, összekötős, közelítős) találnak. Ezek megoldására idő
és pontosság alapján pontszámot kapnak a tanulók. Az eredmények
megjelennek az adott feladat mellett, illetve az összesített pontszám
megjelenik egy külön menüpontban. (összesített pontszámok).”


## 2. Jelenlegi helyzet
● Ennek a fejezetnek a feladata kifejteni, hogy miért van szükség az
alkalmazásunkra. Érdemes minél lényegretörőbbnek lenni benne, minél
több pontban ecsetelve a szükséget.
● Példa: “Az oktatásért felelős szervek hierarchikus rendszerében legalul
foglalnak helyet az iskolák. Ebből adódóan nem azok alakítják ki a
tanrendet akik a tanulók érdekeit tartják szem előtt. Jelenleg az oktatási
rendszer: Szigorú a diákokhoz; A tanárok nem tudnak párhuzamosan
foglalkozni a diákokkal; Nincs lehetőség a diákok egyéni igényeihez
igazodni; lexikális tudásközpontú, stresszes, nem motiváló, nem játékos;
elméleti alapú, nagyon kevés gyakorlattal; XX. századi, elavult
módszereket használó. Ezek miatt a mai oktatás alapvetően nyomasztó
és demotiváló hatással bír.”


## 3. Vágyálom rendszer
● A vágyálom rendszer azért felelős, hogy kifejtsük benne mit szeretnénk
célul a programunkban a 100%-ban ideális esetben. Ilyen-olyan
feature-ök jelenléte, és ideális állapotuk stb.
● Példa: “A projekt célja egy olyan rendszer, ami játékos tanulás, gyakorlás
lehetőségét biztosítja. A rendszer elérhető több platformon, weben és androidon
is. Regisztrációt követően több típusú feladat közül választhat a felhasználó.
Látványos, színes felülettel rendelkezik a program, hogy felkeltse a felhasználók
figyelmét. A szórakoztatóbb tanulás érdekében játékos elemeket tartalmaznak
az egyes feladatok. A rendszer lehetőséget nyújt a felhasználók
teljesítményének tárolására (toplista), ennek segítségével másokkal is
összemérhetik a tudásukat. A rendszerben szükséges egy pontozási rendszer,
amely a helyesen megválaszolt feladványok után adja a felhasználónak a
pontokat. Ez a pontozási rendszer optimális esetben függ a feladatokhoz
meghatározott időtől is.A rendszernek van egy admin felülete is, ahol az admin
fiókkal bejelentkezett felhasználó fel tudja tölteni a feladványokat. ”


## 4. Funkcionális követelmények
● A funkcionális követelményeknél azt kell leírnunk, hogy a program
bizonyos részegységeihez milyen funkciók tartoznak. Milyen
felhasználói, adminisztrációs, egyéb funkciók vannak stb.


## 5. Rendszerre vonatkozó törvények, szabványok, ajánlások
● Talán az egyik legkényesebb része a dokumentumnak. A cím magáért
beszél, le kell írnunk a programunkra vonatkozó jogszabályokat, mely
szabványok szerint szeretnénk elkészíteni.


## 6. Jelenlegi üzleti folyamatok modellje
● Bővebben kifejteni azt a folyamatot, amit a programunk szeretne
leváltani vagy kibővíteni. A példa alapján ez az iskolai tanulás folyamata.
● Példa: “A mai világban az oktatás nem használja ki a már meglévő
technológiákat arra, hogy a tanulást sokkal szórakoztatóbbá és interaktívabbá
tegye. A jelenlegi világban a fiatalok egyre kevésbé hajlandóak a "klasszikus"
módon tanulni, ezért a különböző oktatási intézmények alternatív módszereket
keresnek. Jelenleg a diákok tankönyvekből tanulnak és papír alapon adnak
számot tudásukról, amely a XXI. században elavultnak számít. Ez rengeteg
nyomdai és nyomtatási költséget jelent. Az oktatóknak rengeteg időt elvesz az
idejéből a dolgozatok egyesével való kijavítása. Illetve a dolgozatok megírása
papíron is sokkal időigényesebb, mintha különböző alkalmazásokat
használnánk a diákok számonkérésére. ”


## 7. Igényelt üzleti folyamatok
● A 6. pontban leírt folyamatot hogyan szeretnénk leváltani vagy
kibővíteni.
● Példa: “A megrendelő a fő oldalon akar bejelentkezni (felhasználónév, jelszó),
valamint a regisztrációt megkezdeni, mely egy új oldalon folytatódna (felh.,
jelszó, e-mail). Bejelentkezést követően lehetőséget, hozzáférést kell adni
szerepkörtől függően az alkalmazás funkcióihoz. A feladatokat a tanár állíthatja
össze, ezért ezeket részekre kell szedni. Kvíz mely konkrét választ vár. Kvíz,
mely több válasz közüli lehetőséget kínál, ezen belül 1 vagy több helyes
válasszal. Rajz feladat, és ezek tetszőleges kombinációja lenne egy feladatsor.”
![Image](7. Igényelt üzleti folyamatok.png)


## 8. Követelménylista (KÖTELEZŐ!)
● A programozás szempontjából talán a legfontosabb része a
dokumentumnak. Itt kell leírni azt, hogy milyen funkciókkal kell
rendelkeznie a programunknak, ezeknek milyen al-funkciói vannak.
● Példa:
Modul ID Név v. Kifejtés
Jogosultság K1 Bejelentkezési
felület 1.0
A felhasználó az email címe és a jelszava
segítségével bejelentkezhet.
Ha a megadott email cím vagy jelszó nem
megfelelő, akkor a felhasználó hibaüzenetet kap.
Jogosultság K2 Regisztráció 1.0
A felhasználó a felhasználói nevének, email
címének és jelszavának megadásával regisztrálja
magát.
A jelszó tárolása kódolva történik az adatbázisban.
Ha valamelyik adat ezek közül hiányzik vagy nem
felel meg a követelményeknek,
akkor a rendszer értesíti erről a felhasználót.
Jogosultság K3 Jogosultsági
szintek 1.0
- Admin : Rendszerhozzáférés, feladatok
feltöltése, felhasználók / szerepkörök módósítása.
- Tanár : Feladatok feltöltése / létrehozása,
elektronikus napló hozzáférés, órarend, üzenetek.
- Diák : Feladatok kitöltése / elvégzése,
elektronikus napló látható, órarend, üzenetek.
- Szülő: Diák órarendje, üzenetek, Diák
elektronikus naplója látható.
Modifikáció K4 Felhasználó
módosítása 1.0
A felhasználó módosítani tudja saját
Felhasználónevét. Ehhez szükséges a régi és az új
felhasználók megadása, az új megerősítése,
valamint a felhasználó jelszavának megadása.
Modifikáció K5 Jelszó módosítása 1.0
A felhasználó módosítani tudja saját jelszavát.
Ehhez szükséges a régi és az új jelszavának
megadása, valamint az új megerősítése.
Modifikáció K6
Elfelejtett
felhasználónév /
jelszó
1.0
Ha a felhasználó elfelejtette a felhasználónevét,
vagy jelszavát akkor ezzel az opcióval egy
Adminhoz tud fordulni.
Feladattípus K7 Kvíz 1.0
Több kérdésből áll, a feladat a helyes válasz
kiválasztása több lehetőség közül. A felhasználó
az eltelt idő függvényében pontot kap.
Feladattípus K8 Teszt 1.0
A teszthez hasonló, ugyanolyan több kérdésből
álló feladatsor, ahol az idő számít. A kapott
pontszám alapján érdemjegyet kap a felhasználó.
Statisztika K9 Toplista 1.0 Egy lista a játékosok pontszámairól, a lista elején
a legtöbb pontot elért felhasználó található.
Felület K10 Üzenetek 1.0 A felhasználók egymást között tudnak küldeni
üzeneteket, jogosultságuktól függően.
Felület K11 Órarend 1.0
A felhasználóknak, szerepkörtől függően, van egy
órarendje, ahol láthatják, melyik órák, mikor hol
lesznek.
Felület K12 Elektronikus Napló 1.0
A felhasználók itt láthatják megszerzett
érdemjegyeiket, dicséreteiket, rovásaikat.
Szerepkörtől függően mást látnak.
Felület K13 Bejelentkezés 1.0
A felhasználók itt tudnak bejelentkezni a
rendszerbe, probléma esetén jelszót, emailt
változtatni.
Felület K14 Teszt létrehozás 1.0
A tanári jogosultságú felhasználóknak elérhető a
teszt létrehozás, amit később kiadhat diákok
számára.
Jogosultság K15 Admin felület 1.0
Felület az admin fiókkal rendelkező felhasználó
számára. Tartalmaz egy felületet az új feladatok
feltöltéséhez.
”


## 9. Riportok
● Létezik az úgynevezett szabad riport amelyben igazából csak azt a
kérdést tesszük fel, hogy hogyan kellene működnie az új rendszernek. A
másik típus az irányított amely inkább egy rövid válaszokra épülő
kérdőívnek tűnhet.


## 10. Fogalomtár
● A cím magáért beszél. Itt kell leírnunk azokat a kifejezéseket, amelyek a
programunkban fognak illetve ebben a dokumentumban már
szerepelnek, és nem biztos, hogy érthető egy külsős embernek.
● Példa: “Reszponzív felület - Mobilon, Tableten, PC-n igazodik a
képernyőhöz a felület mérete, azaz több eszközön is probléma nélkül
üzemelhet.”