// Dashboard 1 Morris-chart
$(function () {
    "use strict";
Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2013',
            Asisten_Ahli: 50,
            Lektor: 80,
            Lektor_Kepala: 20
        }, {
            period: '2014',
            Asisten_Ahli: 130,
            Lektor: 100,
            Lektor_Kepala: 80
        }, {
            period: '2015',
            Asisten_Ahli: 80,
            Lektor: 60,
            Lektor_Kepala: 70
        }, {
            period: '2016',
            Asisten_Ahli: 70,
            Lektor: 200,
            Lektor_Kepala: 140
        }, {
            period: '2017',
            Asisten_Ahli: 180,
            Lektor: 150,
            Lektor_Kepala: 140
        }, {
            period: '2018',
            Asisten_Ahli: 105,
            Lektor: 100,
            Lektor_Kepala: 80
        },
         {
            period: '2019',
            Asisten_Ahli: 250,
            Lektor: 150,
            Lektor_Kepala: 200
        }],
        xkey: 'period',
        ykeys: ['Asisten_Ahli', 'Lektor', 'Lektor_Kepala'],
        labels: ['Asisten_Ahli', 'Lektor', 'iPod Touch'],
        pointSize: 3,
        fillOpacity: 0,
        pointStrokeColors:['#55ce63', '#009efb', '#2f3d4a'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 3,
        hideHover: 'auto',
        lineColors: ['#55ce63', '#009efb', '#2f3d4a'],
        resize: true
        
    });

	
	
Morris.Area({
        element: 'morris-area-chart2',
        data: [{
            period: '2010',
            SiteA: 0,
            SiteB: 0,
            
        }, {
            period: '2011',
            SiteA: 130,
            SiteB: 100,
            
        }, {
            period: '2012',
            SiteA: 80,
            SiteB: 60,
            
        }, {
            period: '2013',
            SiteA: 70,
            SiteB: 200,
            
        }, {
            period: '2014',
            SiteA: 180,
            SiteB: 150,
            
        }, {
            period: '2015',
            SiteA: 105,
            SiteB: 90,
            
        },
         {
            period: '2016',
            SiteA: 250,
            SiteB: 150,
           
        }],
        xkey: 'period',
        ykeys: ['SiteA', 'SiteB'],
        labels: ['Site A', 'Site B'],
        pointSize: 0,
        fillOpacity: 0.4,
        pointStrokeColors:['#b4becb', '#009efb'],
        behaveLikeLine: true,
        gridLineColor: '#e0e0e0',
        lineWidth: 0,
        smooth: false,
        hideHover: 'auto',
        lineColors: ['#b4becb', '#009efb'],
        resize: true
        
    });


// LINE CHART
        var line = new Morris.Line({
          element: 'morris-line-chart',
          resize: true,
          data: [
            {y: '2011 Q1', item1: 2666},
            {y: '2011 Q2', item1: 2778},
            {y: '2011 Q3', item1: 4912},
            {y: '2011 Q4', item1: 3767},
            {y: '2012 Q1', item1: 6810},
            {y: '2012 Q2', item1: 5670},
            {y: '2012 Q3', item1: 4820},
            {y: '2012 Q4', item1: 15073},
            {y: '2013 Q1', item1: 10687},
            {y: '2013 Q2', item1: 8432}
          ],
          xkey: 'y',
          ykeys: ['item1'],
          labels: ['Item 1'],
          gridLineColor: '#eef0f2',
          lineColors: ['#009efb'],
          lineWidth: 1,
          hideHover: 'auto'
        });
 // Morris donut chart
        
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12,

        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true,
        colors:['#009efb', '#55ce63', '#2f3d4a']
    });

// Morris bar chart
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90,
            c: 60
        }, {
            y: '2007',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2008',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2009',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2010',
            a: 50,
            b: 40,
            c: 30
        }, {
            y: '2011',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2012',
            a: 100,
            b: 90,
            c: 40
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['A', 'B', 'C'],
        barColors:['#55ce63', '#2f3d4a', '#009efb'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
// Extra chart
 Morris.Area({
        element: 'extra-area-chart',
        data: [{
                    period: '2010',
                    Asisten_Ahli: 0,
                    Lektor: 0,
                    Lektor_Kepala: 0
                }, {
                    period: '2011',
                    Asisten_Ahli: 50,
                    Lektor: 15,
                    Lektor_Kepala: 5
                }, {
                    period: '2012',
                    Asisten_Ahli: 20,
                    Lektor: 50,
                    Lektor_Kepala: 65
                }, {
                    period: '2013',
                    Asisten_Ahli: 60,
                    Lektor: 12,
                    Lektor_Kepala: 7
                }, {
                    period: '2014',
                    Asisten_Ahli: 30,
                    Lektor: 20,
                    Lektor_Kepala: 120
                }, {
                    period: '2015',
                    Asisten_Ahli: 25,
                    Lektor: 80,
                    Lektor_Kepala: 40
                }, {
                    period: '2016',
                    Asisten_Ahli: 10,
                    Lektor: 10,
                    Lektor_Kepala: 10
                }


                ],
                lineColors: ['#55ce63', '#2f3d4a', '#009efb'],
                xkey: 'period',
                ykeys: ['Asisten_Ahli', 'Lektor', 'Lektor_Kepala'],
                labels: ['Site A', 'Site B', 'Site C'],
                pointSize: 0,
                lineWidth: 0,
                resize:true,
                fillOpacity: 0.8,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto'
        
    });
 });    