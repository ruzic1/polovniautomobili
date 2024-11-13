var url=window.location.href;
console.log(url);
/*var reverseString=url.lastIndexOf('/');
var newString=reverseString.substring()*/
var splittedText=url.lastIndexOf('/');
var newOne=url.substring(0,splittedText);
console.log(splittedText);
console.log(newOne);

/*if(newOne.indexOf('http://polovniautomobili.test/users/showUserInfo')!=-1){
    console.log(123);
    fetch('/fetchOffersForUser',{
        method:'GET',
        headers:
        {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':document.querySelector("meta[name='csrf-token']").getAttribute('content')
        }
    }
    ).then(function(response){
        return response.json();

    }).then(function(data){
        console.log(data);
    })
    .catch(function(err){
        console.log(err);
    })
}*/
window.onload=function(){
    var abcd=document.getElementById('carModel');

    abcd.dispatchEvent(new Event('change'));
}


function handleDropdownChange(selected)
{
    console.log(555);
    var index=selected.selectedIndex;
    //console.log(index);
    var chosenOption=selected.options[index];
    var selectedValue=chosenOption.value;
    console.log(selectedValue);


    fetch('/getOptions',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':document.querySelector("meta[name='csrf-token']").getAttribute('content')
        },
        body:JSON.stringify({
            key1:selectedValue,
        })
    })
    .then(response=>{
        return response.json();
    })
    .then(data=>{
        console.log(data);
        var abc=document.getElementById('carModel');
        console.log(abc.dataset.model);
        if(data.length==0){
            document.getElementById('carModel').setAttribute('disabled',true);
            document.getElementById('carModel').selectedIndex=-1;
        }
        else{
            document.getElementById('carModel').removeAttribute('disabled');
            var html="";
            for(var i=0;i<data.length;i++){
                html+=`<option value='${data[i].id_car_model}'>${data[i].car_model}</option>`
            }
            document.getElementById('carModel').innerHTML=html;
        }
    })
    console.log(selectedValue);
}


/*if(document.getElementById('applyFilters')!=null){
    console.log('Ulazi u formu sa filter')
    document.getElementById('applyFilters').addEventListener('click',function(){
        var abcd=123;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('cars/filter-offers',{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':csrfToken
            },
            body:JSON.stringify(abcd)
        })
        .then(response=>response.json())
        .then(data=>{
            console.log(data);
        })
        .catch(error=>{
            console.error('Error:',error);
        })
    })
}*/
function abcd(){
    console.log(123);
}
//console.log(document.getElementById('abcdef'))
/*if(document.getElementById('abcdef')!=null){
    //console.log(123);
    var secondaryImagesSequence=document.getElementById('abcdef')
    //console.log(JSON.parse(secondaryImagesSequence.dataset.images));
    var parsed=JSON.parse(secondaryImagesSequence.dataset.images);
    console.log(parsed);
    var html="";
    console.log(parsed.length);
    console.log(window.location.origin+'/public/storage/'+parsed[0].secondary_image_src);
    for(var i=0;i<parsed.length;i++){
        html+=`<img src='${window.location.origin+'/public/storage/'+parsed[i].secondary_image_src}' style='width:60px;height:80px'/>`;
    }
    secondaryImagesSequence.innerHTML=html;
}*/
/*window.onload=function(){
    console.log('Uslo je u stranicu');

    fetch('/fetchOffersForUser',{
        method:'GET',
        headers:
        {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':document.querySelector("meta[name='csrf-token']").getAttribute('content')
        }
    }
    ).then(function(response){
        return response.json();

    }).then(function(data){
        console.log(data);
    })
    .catch(function(err){
        console.log(err);
    })
}*/
