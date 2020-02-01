$( document ).ready(function() {
  /************************************************************
  *                      Example One                          *
  ************************************************************/
  const chart1 = document.getElementById('chart-example-1');
  const data1 = [
    ['Apples', 11],
    ['Oranges', 24],
    ['Pears', 18]
  ];

  createBarChart(data1, chart1);

  /************************************************************
  *                      Example Two                          *
  ************************************************************/
  const chart2 = document.getElementById('chart-example-2');
  const data2 = [
    ['Pennywise', 10],
    ['Witch', 13],
    ['Spiderman', 18],
    ['Skeleton', 7],
    ['Jack o\' Lantern', 6]
  ];
  const options2 = {
    width: 768,
    height: 480,
    title: 'Halloween Costume Popularity (%)',
    titleFontSize: 24,
    titleColor: 'yellow',
    titleBG: 'orange',
    chartBG: 'black',
    valColors: ['white', 'brown', 'blue', 'black', 'yellow'],
    barColors: ['darkred', 'darkgreen', 'red', 'white', 'orange'],
    labelColors: ['darkred', 'darkgreen', 'red', 'black', 'orange'],
    labelPos: 'bottom',
    axisColor: 'orange',
    axisWidth: 7,
    barSpacing: 0.6,
    ticks: 5
  };

  createBarChart(data2, chart2, options2);

  /************************************************************
  *                      Example Three                        *
  ************************************************************/
  const chart3 = document.getElementById('chart-example-3');
  const data3 = [
    ['Home', 9140000000000],
    ['Auto', 1650000000000],
    ['Student Loans', 1440000000000],
    ['Credit Cards', 829000000000]
  ];
  const options3 = {
    width: 768,
    height: 480,
    title: 'US Consumer Debt ($)',
    titleFontSize: 24,
    titleBG: 'lightgreen',
    titleColor: 'black',
    barColors: ['lightgreen'],
    labelPos: 'middle',
    barSpacing: 0.6,
    ticks: 6,
    axisWidth: 2
  };

  createBarChart(data3, chart3, options3);
});
