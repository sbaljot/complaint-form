const firebaseConfig = {
    apiKey: "AIzaSyC9RqHiuwxfkQgusDmW9O90P97uPn5QwsA",
    authDomain: "complaint-form-d4e6b.firebaseapp.com",
    projectId: "complaint-form-d4e6b",
    storageBucket: "complaint-form-d4e6b.appspot.com",
    messagingSenderId: "1004288507296",
    appId: "1:1004288507296:web:c046e69f2293903f19f8c5"
};
firebase.initializeApp(firebaseConfig);
var db = firebase.firestore();

var btn = document.getElementById("submit");
var form = document.getElementById('form');
var msg = document.getElementById('message');
btn.addEventListener('click', function (e) {
    e.preventDefault();
    msg.innerText = "Thanks for submitting, we'll look into it soon.";
    children_list = [];
    for (i = 0; i <= 17; i++) {
        if (form.children[i].value != undefined) {
            children_list.push(form.children[i].value);
        }
    }
    updateDB(children_list);
    setTimeout(function(){
        msg.innerText = '';
    }, 3000);
    form.reset();

});
function updateDB(arr) {
    db.collection("Users").doc(arr[0]).add({
        Name: arr[0],
        Phase: arr[1],
        Block: arr[2],
        Members: arr[3],
        Years: arr[4],
        Complaint_type: arr[5],
        Complaint: arr[6]
    });
}