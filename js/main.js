var displayChart = function (chartName) {
    var chart = new CanvasJS.Chart(chartName,
        {
            data: [
                {
                    type: "pie",
                    showInLegend: true,
                    dataPoints: [
                        {  y: 4181563, legendText: "Fifa", indexLabel: "Fifa" },
                        {  y: 2175498, legendText: "Cards", indexLabel: "Cards" },
                        {  y: 3125844, legendText: "Ping Pong", indexLabel: "Ping Pong" },
                        {  y: 1176121, legendText: "Tennis", indexLabel: "Tennis"},
                        {  y: 1727161, legendText: "Chess", indexLabel: "Chess" },
                        {  y: 4303364, legendText: "Soccer", indexLabel: "Soccer"},
                        {  y: 1717786, legendText: "Pool", indexLabel: "Pool"}
                    ]
                }
            ]
        });

    chart.render();
}





