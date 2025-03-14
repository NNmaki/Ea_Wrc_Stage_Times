
function navigateToPage(select) {
    let url = select.value;
    if (url) {
        window.location.href = url;
    }
}

function openNewRecord(tableName, stageTitle, distance, legInfo) {
    document.getElementById('popup-addrecord').style.display = 'flex';
    document.getElementById("table").value = tableName;
    document.getElementById("popup-title").innerText = "NEW STAGE TIME";
    document.getElementById("popup-stage").innerText = stageTitle + " " + distance;
    document.getElementById("popup-leg").innerText = "(" + legInfo + ")";
    
}

function closeNewRecord(){
    document.getElementById('popup-addrecord').style.display = 'none';
}

function validateTimeInput(event) {
    const minutes = document.getElementById("minutes");
    const seconds = document.getElementById("seconds");
    const milliseconds = document.getElementById("milliseconds");
    const errorMsg = document.getElementById("errorMsg");

    if (!minutes || !seconds || !milliseconds) {
        console.error("One or more time input fields are missing.");
        return;
    }

    const timeValue = `${minutes.value}'${seconds.value}"${milliseconds.value}`;
    const timeRegex = /^\d{2}'\d{2}"\d{3}$/; 

    if (!timeRegex.test(timeValue)) {
        event.preventDefault(); 
        minutes.style.borderColor = "red";
        seconds.style.borderColor = "red";
        milliseconds.style.borderColor = "red";
        errorMsg.style.display = "block";
    } else {
        minutes.style.borderColor = "green";
        seconds.style.borderColor = "green";
        milliseconds.style.borderColor = "green";
        errorMsg.style.display = "none";
    }
}

window.onload = function() {
    const params = new URLSearchParams(window.location.search);
    if (params.has("success")) {
        showSuccessPopup("Time saved successfully!");
    }
};

function showSuccessPopup(message) {
    document.getElementById("success-message").innerText = message; 
    document.getElementById("success-popup").style.display = "flex";
}

function closeSuccessPopup() {
    document.getElementById("success-popup").style.display = "none";
    const url = new URL(window.location);
    url.searchParams.delete("success");
    window.history.replaceState({}, document.title, url);
}



function showAllTimes(tableName, stageTitle, distance, legInfo) {

    document.getElementById("alltimes-popup-stage").innerText = stageTitle + " " + distance;
    document.getElementById("alltimes-popup-leg").innerText = "(" + legInfo + ")";

    let tableBody = document.querySelector(".popup-show-all-times-content tbody");
    tableBody.innerHTML = "";

    fetch("src/fetch_times.php?table=" + tableName)
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                tableBody.innerHTML = "<tr><td colspan='5'>No records at the moment</td></tr>";
            } else {
                data.forEach((row, index) => { 
                    let tr = document.createElement("tr");
                    tr.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${row.driver}</td>
                        <td>${row.class}</td>
                        <td>${row.car}</td>
                        <td>${row.time}</td>
                        <td>${row.created_at}</td>
                    `;
                    tableBody.appendChild(tr);
                });
            }
        })
        .catch(error => console.error("Error fetching data:", error));
    
      let scrollPosition = window.scrollY;
      let popup = document.getElementById("popup-show-all-times");
      popup.style.top = `${scrollPosition + 500}px`;
      popup.style.display = "flex";

}

function closeShowAllTimes() {
    document.getElementById("popup-show-all-times").style.display = "none";
}
