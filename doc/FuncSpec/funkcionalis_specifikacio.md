(http://aries.ektf.hu/~tajti/rft-afp/AFP_v2.pdf)

## Funkcionális Specifikáció

## 1. Overview
This website is an official website for Annales Mathematicae et
Informaticae, which is an international journal of
the Institute of Mathematics and Informatics of
Eszterházy Károly University (Eger, Hungary), published
by Líceum University Press. This journal is open for
scientific publications in mathematics and computer
science, where the field of number theory, group theory,
constructive and computer aided geometry as well as theoretical
and practical aspects of programming languages receive particular
emphasis. Our goal is to provide our users with a convenient platform.
They will have the access to publish the work on out website. Every user
will have their own account, and they can submit and view their articles
via a very beautiful UI. Everything is free, and everyone will be able to publish
articles. we welcome good articles about mathematics and computer science
as lone as they are new and unpublished.

## 2. Present Situation
Authors want to publish their work of the in our journal
they provide in order to share their knowledge and experience with
other authors and users. They can create accounts in this
system that would work using modern solutions over the Internet.
The service requires that all of this be available online,
and accordingly a website must be made available to the customer.
So far, the customer can use a website to read and publish.
For the reasons above, we made this website, which fit the requirement.


## 3. List of requirements
| Modul  | ID  | Name |  Version | Explanation |
|---|---|---|---|---|
| Permission  | K1  | Login | 1.0  | The user can login with his E-mail and Password. If one of them is(or both are) incorrect then an error will pop up for the user.  |
| Permission | K2 | Register |  1.0 | The user have to give a username, e-mail address and a password. If one of them is missing from the requirement, the user will be alerted about the problem. |
| Permission | K3 | User rang |  1.0 | - Admin : Article reviewing, acces to the Admin panel |
| | | | | - User : create articles, user modification |
| | | | | - Guest : register, login |
| Modify | K4 | user modification |  1.0 | Users have an option to change their username and password. If the user wants to change the password then he has to write the NEW password, the verification of the new one and the old password. |
| Modify | K5 | Elfelejtett jelszó |  1.0 | If the user forgets his password he has an option to reset his password which will be sent to his registered E-mail address. |

## 4. Jelenlegi üzleti folyamatok modellje
Példa: “A mai világban az oktatás nem használja ki a már meglévő technológiákat
arra, hogy a tanulást sokkal szórakoztatóbbá és interaktívabbá tegye.
A jelenlegi világban a fiatalok egyre kevésbé hajlandóak a
"klasszikus" módon tanulni, ezért a különböző oktatási intézmények
alternatív módszereket keresnek. Jelenleg a diákok tankönyvekből
tanulnak és papír alapon adnak számot tudásukról, amely a XXI.
században elavultnak számít. Ez rengeteg nyomdai és nyomtatási
költséget jelent. Az oktatóknak rengeteg időt elvesz az idejéből a
dolgozatok egyesével való kijavítása. Illetve a dolgozatok megírása
papíron is sokkal időigényesebb, mintha különböző alkalmazásokat
használnánk a diákok számonkérésére.”

## 5. Igényelt üzleti folyamatok modellje
● Példa: “Azért hogy egyszerűbbé tegyük a diákok és a tanárok
feladatát, létrehozunk egy programot ami a mai kornak megfelelően
helyt tud állni az elektronikai világban. A tanároknak egyszerűbb lesz
mert csak egyszer kell felvinniük a rendszerbe a feladatsort és a
helyes válaszokat is csak egyszer kell kiválasztania. Ezáltal nem kell
minden dolgozatot egyesével átvizsgálni lepontoznia és érdemjegyet
adni rá, így sokkal több időt megtakaríthat. A diákoknak is sokkal
jobb mert nem kell azon görcsölniük hogy milyen lett az eredmény
mert a teszt kitöltése után egyből megtudják az eredményt és a hibás
válaszokra is a helyes választ. Illetve tanulni is sokkal könnyebb
nekik mert csak előkeresik a az éppen feladott leckét és már
tanulhatják is és egyből ellenőrizhetik magukat. Nem kell minden
egyes könyvet külön előkeresni megkeresni a fejezetet végéig
lapozni. A szülők egyből értesülnek a dolgozatok eredményeiről.”

## 6. Használati esetek
● Ez a fejezet leírja pl. melyik felhasználó milyen funkciókat tud
használni.
● Példa: “ADMIN: Az ADMIN beléphet mindegyik más szerepkörbe,
hogy az hibamentes működését ellenőrizhesse. Az Admin(ok)
feladata a rendszer problémamentes működése. Ez egyben jár azzal,
hogy az egész rendszerhez van hozzáférésük. Az Admin(ok)nak
hozzá kell tudni férniük a felhasználók listájához, ahol mindent
átváltoztathatnak egy felhasználó profilján. Tudniuk kell a
felhasználók jogosultságait, szerepkörét, jelszavát, és
felhasználónevét módosítani. Továbbá képesnek kell lenniük arra,
hogy felhasználókat vegyenek fel rendszerbe és, hogy rakjanak le
belőle. Fontos, hogy ők is képesek feladatok létrehozni, mint a
tanárok. Képesek üzenetet küldeni az összes felhasználónak,
valamint globális üzeneteket, amelyet mindenki megkap egyszerre. A
Diák jegyeit csak ők tudják módosítani, miután a Tanár adott neki.”

## 7. Megfeleltetés, hogyan fedik le a használati esetek a
követelményeket
●

## 8. Képernyő tervek
● A képernyő tervek mutatják meg, hogy mely funkciók kerülnek
egymás mellé, melyik képernyőről mely képernyőre juthatunk.
● Példa:
![Image](8. Képernyő tervek példa.png)

## 9. Forgatókönyv
● A forgatókönyvek a rendszer egy-egy tipikus felhasználását
mutatják be. A forgatókönyvnek általában van egy célja, például egy
iktató rendszerben: Levél érkeztetése, címzett értesítése,
dokumentumtárba helyezés. A forgatókönyv bemutatja, milyen
funkciókat kell használni, milyen sorrendben a kívánt cél elérése
érdekében. Ilyen értelem egy telepítési útmutatóhoz hasonlítanak.
● Példa: “Szereplők: Futási időben három szereplő figyelhető meg. Az
első szereplő maga a futó alkalmazás. (weben/androidon)
Bejelentkezve kilehet választani a kívánt játékot. Megjelenik a timer a
segítségek, és a játékos feladat. Ezzel van interakcióban a második
szereplő, maga a felhasználó, aki kitölti a tesztet, úgy hogy az időn
ne lépjen túl, és ha szüksége van akkor igénybe veheti a segítségek
egyikét A harmadik szereplő egy web-service, ami a tesztekhez
szükséges adatokat szolgáltatja az alkalmazásnak egy adatbázisból.”


## 10.Funkció - követelmény megfeleltetés
●


## 11.Fogalomszótár
● A fogalomszótár a dokumentációban megemlített idegen esetleg
nem egyértelmű jelentésű szavak / szakszavak pontos
meghatározását írja le.
● Példa: “[web-service]:különböző programnyelveken írt és különböző
platformokon futó szoftveralkalmazások interneten keresztül történő
adatcseréjére használt vebszolgáltatások.
[multiplatform]: több környezetben futtatható alkalmazás.
[main menu]: A fő menü, amely a weboldal indulásakor megjelenik.