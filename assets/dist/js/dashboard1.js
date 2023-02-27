$(function () {
    "use strict";
    //This is for the Notification top right
    $.toast({
            heading: 'Welcome to SIJALI3'
            , text: ''
            , position: 'top-right'
            , loaderBg: '#ff6849'
            , icon: 'info'
            , hideAfter: 2500
            , stack: 6
        })
        // Dashboard 1 Morris-chart
  Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2013',
            Asisten_Ahli: 50,
            Lektor: 80,
            Lektor_Kepala: 20,
			Guru_Besar:1
        }, {
            period: '2014',
            Asisten_Ahli: 130,
            Lektor: 100,
            Lektor_Kepala: 80,
			Guru_Besar:1
			
        }, {
            period: '2015',
            Asisten_Ahli: 80,
            Lektor: 60,
            Lektor_Kepala: 70,
			Guru_Besar:1
        }, {
            period: '2016',
            Asisten_Ahli: 70,
            Lektor: 200,
            Lektor_Kepala: 140,
			Guru_Besar:1
        }, {
            period: '2017',
            Asisten_Ahli: 180,
            Lektor: 150,
            Lektor_Kepala: 140,
			Guru_Besar:0
        }, {
            period: '2018',
            Asisten_Ahli: 105,
            Lektor: 100,
            Lektor_Kepala: 80,
			Guru_Besar:0
        },
         {
            period: '2019',
            Asisten_Ahli: 250,
            Lektor: 150,
            Lektor_Kepala: 200,
			Guru_Besar:1
        }],
        xkey: 'period',
        ykeys: ['Asisten_Ahli', 'Lektor', 'Lektor_Kepala', 'Guru_Besar'],
        labels: ['Asisten_Ahli', 'Lektor', 'Lektor_Kepala', 'Guru_Besar'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#55ce63', '#009efb', '#e819e9','#adafga2'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#55ce63', '#009efb', '#e819e9','#adafga2'],
        resize: true
        
    });
    Morris.Area({
        element: 'morris-area-chart2'
        , data: [{
                period: '2010'
                , SiteA: 0
                , SiteB: 0
        , }, {
                period: '2011'
                , SiteA: 130
                , SiteB: 100
        , }, {
                period: '2012'
                , SiteA: 80
                , SiteB: 60
        , }, {
                period: '2013'
                , SiteA: 70
                , SiteB: 200
        , }, {
                period: '2014'
                , SiteA: 180
                , SiteB: 150
        , }, {
                period: '2015'
                , SiteA: 105
                , SiteB: 90
        , }
            , {
                period: '2016'
                , SiteA: 250
                , SiteB: 150
        , }]
        , xkey: 'period'
        , ykeys: ['SiteA', 'SiteB']
        , labels: ['Site A', 'Site B']
        , pointSize: 0
        , fillOpacity: 0.4
        , pointStrokeColors: ['#b4becb', '#01c0c8']
        , behaveLikeLine: true
        , gridLineColor: '#e0e0e0'
        , lineWidth: 0
        , smooth: false
        , hideHover: 'auto'
        , lineColors: ['#b4becb', '#01c0c8']
        , resize: true
    });
});    
    // sparkline
    var sparklineLogin = function() { 
        $('#sales1').sparkline([20, 40, 30], {
            type: 'pie',
            height: '90',
            resize: true,
            sliceColors: ['#01c0c8', '#7d5ab6', '#ffffff']
        });
        $('#sparkline2dash').sparkline([6, 10, 9, 11, 9, 10, 12], {
            type: 'bar',
            height: '154',
            barWidth: '4',
            resize: true,
            barSpacing: '10',
            barColor: '#25a6f7'
        });
        
    };    
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();
