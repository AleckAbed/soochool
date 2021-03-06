@extends('default')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('js/select2/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
@endsection


@section('js')


    <script type="text/javascript" src="{{asset('js/select2/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/momentjs/moment.js')}}"></script>
    <script src="{{ asset('js/momentjs/moment-with-locales.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
            /*$('.datetimepicker').datetimepicker(
                {
                    autoclose: !0,
                    componentIcon: ".mdi.mdi-calendar",
                    navIcons: {rightIcon: "mdi mdi-chevron-right", leftIcon: "mdi mdi-chevron-left"}
                }
            )*/


        })
    </script>
    <template id="classes">

        <div class="row">
            <div class="">
                <h2 class="page-head-title" style="margin-left: 20px">Classes</h2>
                <ol class="breadcrumb page-head-nav">
                    <li class="active">Liste des classes</li>
                    {{--<li><a href="#">Tables</a></li>--}}
                    {{--<li class="active">General</li>--}}
                </ol>
            </div>


            <div class="col-lg-3">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading">Classes
                        <div class="tools">
                            <span class="icon mdi mdi-refresh" @click="reload()"></span>
                            {{--<span class="icon mdi mdi-download"></span>--}}
                            {{--<span class="icon mdi mdi-more-vert"></span>--}}
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-condensed table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Non</th>
                                <th class="text-center">Effectif</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="classe in classes" @click="classeClicked(classe)" :class="classeSelectedBgColor(classe)">
                                <td class="text-center">@{{ classe.nom }}</td>
                                <td class="text-center">@{{ classe.eleves_count }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading">Détails</div>
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#eleves-list" data-toggle="tab">Elèves</a></li>
                            <li><a href="#profs-list" data-toggle="tab">Equipe pédagique</a></li>
                            {{--<li><a href="#meatieres-list" data-toggle="tab">Matières</a></li>--}}
                        </ul>
                        <div class="tab-content">
                            <div id="eleves-list" class="tab-pane active cont">
                                    <table class="table table-condensed table-hover table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Nom complet</th>
                                            <th>Sexe</th>
                                            <th>Date de naissance</th>
                                            <th>Adresse</th>
                                            <th>Contact</th>
                                            <th>Nationalite</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="eleve in eleves">
                                            <td>@{{ eleve.nom_complet }}</td>
                                            <td>@{{ eleve.sexe }}</td>
                                            <td>@{{ moment(eleve.date_nsce).format('DD /MM /YYYY') }}</td>
                                            <td>@{{ eleve.adresse }}</td>
                                            <td>@{{ eleve.telephone }}</td>
                                            <td>@{{ eleve.nationalite }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                            </div>
                            <div id="profs-list" class="tab-pane cont">
                                <table class="table table-condensed table-hover table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom complet</th>
                                        <th>Sexe</th>
                                        <th>Adresse</th>
                                        <th>Mobile</th>
                                        <th>Domicile</th>
                                        <th>Matière enseignée</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="intervention in interventions">
                                        <td>@{{ intervention.prof.nom_complet }}</td>
                                        <td>@{{ intervention.prof.sexe }}</td>
                                        <td>@{{ intervention.prof.adresse }}</td>
                                        <td>@{{ intervention.prof.tel_mobile }}</td>
                                        <td>@{{ intervention.prof.tel_domicile }}</td>
                                        <td>@{{ intervention.matiere.intitule}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="meatieres-list" class="tab-pane">
                                <table class="table table-condensed table-hover table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Intitulé</th>
                                        <th>Code</th>
                                        <th>Couleur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <tr v-for="intervention in interventions">
                                        <td>@{{ intervention.matiere.intitule }}</td>
                                        <td>@{{ intervention.matiere.code }}</td>
                                        <td>@{{ intervention.matiere.couleur }}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <script type="module" src="{{asset('js/vues/admin/classes.js')}}"></script>
    <script src="{{ asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>

@endsection


@section('content')

    <classe></classe>

@endsection

