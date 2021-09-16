$(document).ready(function(){
    $('#data-tables').DataTable();
    $(".dashboard-menu-button").click(function(){
        $("body").addClass("open-dashboard");
    });
    $(".dashboard-overlay").click(function(){
        $("body").removeClass("open-dashboard");
    });
    data = ' ';
    $.ajax({
        url : 'http://localhost/medicine-inventory/one-month.php',
        method : 'GET',
        dataType : 'json',
        success : function (data) {
            console.log(data);
            // alert(sum);
            var data = data;
            var medicine = [];
            var quantity = [];
            for(var i in data){
                medicine.push(data[i].medicine);
                quantity.push(data[i].quantity);
            }
            var chartdata = {
                labels: medicine,
                datasets : [
                    {
                        label: 'Medicine Quantity',
                        backgroundColor: 'rgb(254, 108, 46)',
                        barPercentage: 0.1,
                        barThickness: 20,
                        // maxBarThickness: 8,
                        data: quantity
                    }
                ]
            };
            var ctx = $('#myChart');
            var options = {
                maintainAspectRatio: false,
                indexAxis: 'y',
                responsive: true,
                scales: {
                  y: {
                    stacked: true,
                    grid: {
                      display: true,
                      color: "rgba(255,99,132,0.2)"
                    }
                  },
                  x: {
                    grid: {
                      display: false
                    }
                  }
                }
            };
            var barGraph = new Chart(ctx, {
                type : 'line',
                data : chartdata,
                options: options
            });
        },
        error : function(data) {
            console.log(data);
        }
    });
    // Three Month
    $.ajax({
        url : 'http://localhost/medicine-inventory/three-month.php',
        method : 'GET',
        dataType : 'json',
        success : function (data) {
            var data = data;
            var medicine = [];
            var quantity = [];
            for(var i in data){
                medicine.push(data[i].medicine);
                quantity.push(data[i].quantity);
            }
            var chartdata = {
                labels: medicine,
                datasets : [
                    {
                        label: 'Medicine Quantity',
                        // backgroundColor: 'rgb(254, 108, 46)',
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)',
                          'rgb(254, 108, 46)'
                        ],
                        barPercentage: 0.1,
                        barThickness: 20,
                        // maxBarThickness: 8,
                        data: quantity
                    }
                ]
            };
            var ctx = $('#threemonth');
            var options = {
                maintainAspectRatio: false,
                indexAxis: 'y',
                responsive: true,
                scales: {
                  y: {
                    stacked: true,
                    grid: {
                      display: true,
                      color: "rgba(255,99,132,0.2)"
                    }
                  },
                  x: {
                    grid: {
                      display: false
                    }
                  }
                }
            };
            var barGraph = new Chart(ctx, {
                type : 'pie',
                data : chartdata,
                options: options
            });
        },
        error : function(data) {
            console.log(data);
        }
    });
    // Six Month
    $.ajax({
        url : 'http://localhost/medicine-inventory/six-month.php',
        method : 'GET',
        dataType : 'json',
        success : function (data) {
            console.log(data);
            // alert(sum);
            var data = data;
            var medicine = [];
            var quantity = [];
            for(var i in data){
                medicine.push(data[i].medicine);
                quantity.push(data[i].quantity);
            }
            var chartdata = {
                labels: medicine,
                datasets : [
                    {
                        label: 'Medicine Quantity',
                        backgroundColor: 'rgb(254, 108, 46)',
                        barPercentage: 0.1,
                        barThickness: 20,
                        // maxBarThickness: 8,
                        data: quantity
                    }
                ]
            };
            var ctx = $('#sixmonth');
            var options = {
                maintainAspectRatio: false,
                indexAxis: 'y',
                responsive: true,
                scales: {
                  y: {
                    stacked: true,
                    grid: {
                      display: true,
                      color: "rgba(255,99,132,0.2)"
                    }
                  },
                  x: {
                    grid: {
                      display: false
                    }
                  }
                }
            };
            var barGraph = new Chart(ctx, {
                type : 'bar',
                data : chartdata,
                options: options
            });
        },
        error : function(data) {
            console.log(data);
        }
    });
});