var displayChart = function (chartName) {
    var chart = new CanvasJS.Chart(chartName,
        {
            data: [
                {
                    type: "pie",
                    showInLegend: true,
                    dataPoints: [
                        {  y: 20, legendText: "Fifa", indexLabel: "Fifa" },
                        {  y: 5, legendText: "Cards", indexLabel: "Cards" },
                        {  y: 15, legendText: "Ping Pong", indexLabel: "Ping Pong" },
                        {  y: 25, legendText: "Tennis", indexLabel: "Tennis"},
                        {  y: 10, legendText: "Chess", indexLabel: "Chess" },
                        {  y: 10, legendText: "Soccer", indexLabel: "Soccer"},
                        {  y: 15, legendText: "Pool", indexLabel: "Pool"}
                    ]
                }
            ]
        });

    chart.render();
}


var displayMainSlider = function(sliderName){


}




