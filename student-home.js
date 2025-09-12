// Modal functionality
const modal = document.getElementById("rewardsModal");
const btn = document.getElementById("rewardsBtn");
const span = document.querySelector(".close");

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target === modal) {
    modal.style.display = "none";
  }
}



// ===== Recits Modal =====
const recitsModal = document.getElementById("recitsModal");
const recitsList = document.querySelector(".recits-list");
const modalTitle = document.getElementById("modal-subject-title");
const eyeButtons = document.querySelectorAll(".eye-btn");
const recitsClose = recitsModal.querySelector(".close");

// Dummy recitations data
const recitsData = {
  "Math": ["Recit 1", "Recit 2"],
  "Science": ["Recit 1", "Recit 2", "Recit 3"],
  "English": ["Recit 1"]
};

// Open modal with subject recits
eyeButtons.forEach(btn => {
  btn.addEventListener("click", () => {
    const subject = btn.getAttribute("data-subject");
    modalTitle.textContent = subject + " Recitations";

    recitsList.innerHTML = ""; // clear old
    recitsData[subject].forEach(r => {
      const li = document.createElement("li");
      li.textContent = r;
      recitsList.appendChild(li);
    });

    recitsModal.style.display = "block";
  });
});

// Close modal
recitsClose.onclick = function() {
  recitsModal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target === recitsModal) {
    recitsModal.style.display = "none";
  }
}
