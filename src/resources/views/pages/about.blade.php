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
                            <p class="aboutcardtxt">Eszterházy Károly University</p>
                            <p class="aboutcardtxt">Institute of Mathematics and Informatics</p>
                            <p class="aboutcardtxt">H-3300 Eger, Leányka u. 4</p>
                            <p class="aboutcardtxt">Hungary</p>
                            <p class="aboutcardtxt">Tel/Fax: +36-36-520478</p>
                            <a class="aboutcardhref" href="https://mailhide.io/e/zoXKu">E-mail</a>
                            <p class="aboutcardtxt"> </p>

                        </div>
                    </div>
                </div>



            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <img id="imh" src="{{ asset('img/footer/mh.png') }}">
                            <br>
                            <a class="imgname" href="https://hoffmannmiklos.uni-eszterhazy.hu/en">Miklós Hoffmann</a>
                            <h5 class="imgtitel">(Editor-in-Chief)</h5>
                        </div>
                        <div class="col">
                            <img id="itj" src="{{ asset('img/footer/tj.png') }}">
                            <br>
                            <a class="imgname" href="http://juhasztibor.uni-eger.hu/">Tibor Juhász</a>
                            <h5 class="imgtitel">(Managing Editor)</h5>
                        </div>
                        <div class="col">
                            <img id="igk" src="{{ asset('img/footer/gk.png') }}">
                            <br>
                            <a class="imgname" href="https://sites.google.com/site/gkovasz/">Gergely Kovásznai</a>
                            <h5 class="imgtitel">(Managing Editor)</h5>
                        </div>
                        <div class="col">
                            <img id="itt" src="{{ asset('img/footer/tt.png') }}">
                            <br>
                            <a class="imgname" href="https://tomacstibor.uni-eszterhazy.hu/">Tibor Tómács</a>
                            <h5 class="imgtitel">(Technical Editor)</h5>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col">
                            <div class="card">
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



                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
