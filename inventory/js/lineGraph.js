var LineData=[];
var LineQty=[];
var LineMonth=[];
var cur=0;
datas.forEach(function (a, i) {
  LineData.push(datas[cur][0]);
  LineQty.push(datas[cur][1]);
  LineMonth.push(datas[cur][2]);
  cur++;
  });
  // color
  var min = 100;
  var max = 259;
  var num1 = Math.floor(Math.random() * (max - min) + min);
  var num2 = Math.floor(Math.random() * (max - min) + min);
  var num3 = Math.floor(Math.random() * (max - min) + min);
const data = {
  labels: LineMonth,
  datasets: [{
    label: 'Sales',
    borderColor: 'rgb('+num1+','+num2+','+num3+')',
    backgroundColor: 'rgb('+num3+','+num1+','+num2+')',
    data: LineQty,
  }
]
  
  
};
//CONFIG
const config = {
  type: 'line',
  data: data,
  options: {
    plugins:{
        legend:{
            display: true,
            position: 'bottom'
        }
    }
  }
};
//Render
const myChart = new Chart(
document.getElementById('myChart'),
config
);