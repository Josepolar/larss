function openModal(id) {
    document.getElementById(id).style.display = "block";
}

function closeModal(id) {
    document.getElementById(id).style.display = "none";
}

// Function to delete subject with animation
function deleteSubject(subjectId) {
    if (confirm('Are you sure you want to delete this subject?')) {
        const row = event.target.closest('tr');
        row.style.transition = 'opacity 0.3s ease';
        row.style.opacity = '0';
        
        setTimeout(() => {
            const formData = new FormData();
            formData.append('subject_id', subjectId);
            formData.append('delete_subject', '1');
            
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    throw new Error('Network response was not ok');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting subject');
                row.style.opacity = '1';
            });
        }, 300);
    }
}

// Close modal when clicking outside content
window.onclick = function(event) {
    let modals = document.querySelectorAll(".modal");
    modals.forEach(modal => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
}
