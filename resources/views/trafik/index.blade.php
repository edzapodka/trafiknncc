@extends('layouts.master')

@section('content')

    <div ng-controller="TrafikListController">

        <h5> jumlah {% remaining() %}</h5>
        <input type="text" placeholder="Search ..." ng-model="search"/>
        <table class="table">
            <thead>
                <tr>
                    <th>FROM</th>
                    <th>TO</th>
                    <th>TGRP</th>
                    <th>CUSTOMER</th>
                    <th>JENIS TRAFIK</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="trafik in trafiks | filter:search">
                    <td>{% trafik.node %}</td>
                    <td>{% trafik.f_xch %}</td>
                    <td>{% trafik.tgrp %}</td>
                    <td>{% trafik.t_xch %}</td>
                    <td>{% trafik.jenistraf %}</td>
                </tr>
            </tbody>
        </table>
    </div>
@stop