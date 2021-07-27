@extends('layouts.app')

@section('content')

    <div class="containerabout">

        <div class="col">
            <div id="flowroot" class="row">
                <div class="col">
                    <div class="card">
                        <div class="cardheader">
                            <h5 class="aboutcardheader">About us</h5>
                        </div>
                        <div class="cardbody">
                            <p class="aboutcardtxt">Annales Mathematicae et Informaticae is an international journal of the Institute of Mathematics and Informatics of Eszterházy Károly University (Eger, Hungary), published by Líceum University Press.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="cardheader">
                            <h5 class="aboutcardheader">Aims and Scope</h5>
                        </div>
                        <div class="cardbody">
                            <p class="aboutcardtxt">This journal is open for scientific publications in mathematics and computer science, where the field of number theory, group theory, constructive and computer aided geometry as well as theoretical and practical aspects of programming languages receive particular emphasis. Methodological papers are also welcome. Papers submitted to the journal should be written in English. The Editorial Board can accept only new and unpublished material.y</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="aboutcardheadercontact">
                            <h5 class="aboutcardheader">Contact</h5>
                        </div>
                        <div class="cardbodycontatct">
                            <p class="aboutcardtxtc">Eszterházy Károly University</p>
                            <p class="aboutcardtxtc">Institute of Mathematics and Informatics</p>
                            <p class="aboutcardtxtc">H-3300 Eger, Leányka u. 4</p>
                            <p class="aboutcardtxtc">Hungary</p>
                            <p class="aboutcardtxtc">Tel/Fax: +36-36-520478</p>
                            <div class="aboutcardhref">
                            <a  href="https://mailhide.io/e/zoXKu">E-mail</a>
                            </div>


                        </div>
                    </div>
                </div>



            </div>
            <div class="row">
                <div class="col">
                    <div class="row">

                        <div class="colof">
                            <div id="imh" class="card">
                                <img  src="{{ asset('img/about/mh.jpg') }}">
                                <div class="eoffice">
                                   <a class="imgname" href="https://hoffmannmiklos.uni-eszterhazy.hu/en">Miklós Hoffmann</a>
                                </div>
                                <div class="eofficedesc">
                                    <h5 class="imgtitel">(Editor-in-Chief)</h5>
                                </div>
                            </div>
                        </div>

                        <div class="colof">
                            <div id="itj" class="card">
                                <img  src="{{ asset('img/about/tj.jpg') }}">
                                <div class="eoffice">
                                    <a class="imgname" href="http://juhasztibor.uni-eger.hu/">Tibor Juhász</a>
                                </div>
                                <div class="eofficedesc">
                                    <h5 class="imgtitel">(Managing Editor)</h5>
                                </div>
                            </div>
                        </div>

                        <div class="colof">
                            <div id="igk" class="card">
                                <img  src="{{ asset('img/about/gk.png') }}">
                                <div class="eoffice">
                                    <a class="imgname" href="https://sites.google.com/site/gkovasz/">Gergely Kovásznai</a>
                                </div>
                                <div class="eofficedesc">
                                    <h5 class="imgtitel">(Managing Editor)</h5>
                                </div>
                            </div>
                        </div>


                        <div class="colof">
                            <div id="itt" class="card">
                                <img id="ittkep" src="{{ asset('img/about/tt.png') }}">
                                <div class="eoffice">
                                    <a class="imgname" href="https://tomacstibor.uni-eszterhazy.hu/">Tibor Tómács</a>
                                </div>
                                <div class="eofficedesc">
                                    <h5 class="imgtitel">(Technical Editor)</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col">
                            <div id="firstebord" class="card">
                                <div class="eboardheader">
                                    <a href="https://inf.unideb.hu/hu/node/1025">Sándor Bácsó</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Institute of Mathematics and Informatics, University of Debrecen, Debrecen, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://www.grad.hr/sgorjanc/">Sonja Gorjanc</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Mathematics, University of Zagreb, Zagreb, Croatia</p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://www.inf.u-szeged.hu/~gyimi/">Tibor Gyimóthy</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Software Engineering, University of Szeged, Szeged, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="https://ami.uni-eszterhazy.hu/editors.php">József Holovács</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Institute of Mathematics and Informatics, Eszterházy Károly University, Eger, Hungary</p>
                                </div>
                            </div>
                        </div>


                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://users.iit.uni-miskolc.hu/~kovacs/">László Kovács</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Informatics, University of Miskolc, Miskolc, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://people.inf.elte.hu/kozma/eng/index_eng.html">László Kozma</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Software Technology and Methodology, Eötvös Loránd University, Budapest, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a class="borderfade" href="http://liptai.ektf.hu/">Kálmán Liptai</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Institute of Mathematics and Informatics, Eszterházy Károly University, Eger, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://www.matmor.unam.mx/index.php?option=com_content&task=view&id=52&Itemid=62">Florian Luca</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Instituto de Matemáticas, Universidad Nacional Autonoma de México, Michoacán, Mexico</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://oldwww.unibas.it/utenti/mastroianni/index.html">Giuseppe Mastroianni</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Mathematics and Computer Sciences, University of Basilicata, Potenza, Italy</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://aries.ektf.hu/~matyas">Ferenc Mátyás</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Institute of Mathematics and Informatics, Eszterházy Károly University, Eger, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://math.unideb.hu/pinter-akos/">Ákos Pintér</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Institute of Mathematics, University of Debrecen, Debrecen, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://www.uni-miskolc.hu/~matronto/go/main.php">Miklós Rontó</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Analysis, University of Miskolc, Miskolc, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://matematika.emk.uni-sopron.hu/dr-szalay-laszlo">László Szalay</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Institute of Mathematics, University of Sopron, Sopron, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="http://irh.inf.unideb.hu/user/jsztrik/">János Sztrik</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Informatics Systems and Networks, University of Debrecen, Debrecen, Hungary</p>
                                </div>
                            </div>
                        </div>
                        <div class="coldirectrow">
                            <div class="card">
                                <div class="eboardheader">
                                    <a href="https://science.uottawa.ca/mathstat/en/people/walsh-gary-0">Gary Walsh</a>
                                </div>
                                <div class="eboarddesc">
                                    <p class="eboarddescp">Department of Mathematics and Statistics, University of Ottawa, Ottawa, Ontario, Canada</p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

@endsection
