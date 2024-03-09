      var monthData=[];
          datas.forEach(function (a, i) {
          monthData.push(a[2])
          // console.log(a)
          });
          //SETUP
          const data = {
            labels: monthData,
            datasets: []
        };
          var min = 1;
          var max = 339;
          var qtyData=[];
          datas.forEach(function (a, i) {
          qtyData.push(a[1])
          });
          function getDataset(index, data,num1,num2,num3) { 
            return { 
              // label: 'ssss',
              backgroundColor: 'rgb(155, 9, 132)',
              borderColor: 'rgb('+num1+','+num2+','+num3+')',
              data: qtyData,
            }; 
          }
          datas.forEach(function (a, i) {
          var num1 = Math.floor(Math.random() * (max - min) + min);
          var num2 = Math.floor(Math.random() * (max - min) + min);
          var num3 = Math.floor(Math.random() * (max - min) + min);
          // console.log(a[1])
          data.datasets.push(getDataset(i,a,num1,num2,num3));
          });
          
  
        //CONFIG
          const config = {
            type: 'line',
            data: data,
            options: {
              plugins:{
                tooltip: {
                  enabled: true, // <-- this option disables tooltips

                },          
                  legend:{
                      display: false,
                      position: 'bottom'
                  }
              },
            }
          };
  //Render
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );