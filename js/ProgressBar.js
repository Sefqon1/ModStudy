function calculateProgress(total, done) {
    return Math.round((done / total) * 100) + "%";
}


window.onload = function() {
    var progressBar = document.getElementById("progress-bar");
    var progressFill = document.getElementById("progress-fill");
    var total = parseInt(progressBar.getAttribute("data-total"));
    var done = parseInt(progressBar.getAttribute("data-done"));
    var progress = calculateProgress(done, total);
    progressFill.style.width = progress;
    progressFill.innerHTML = progress;
};

