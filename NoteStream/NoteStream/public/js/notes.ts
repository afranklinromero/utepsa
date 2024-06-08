document.addEventListener('DOMContentLoaded', () => {
    const noteItems = document.querySelectorAll('.notes__list-item');
    const noteTitleInput = document.querySelector('.notes__title') as HTMLInputElement;
    const noteBodyTextarea = document.querySelector('.notes__body') as HTMLTextAreaElement;

    noteItems.forEach(item => {
        item.addEventListener('click', (event) => {
            event.preventDefault();
            const noteId = item.getAttribute('data-note-id');
            fetch(`/notes/${noteId}`)
                .then(response => response.json())
                .then(note => {
                    noteTitleInput.value = note.title;
                    noteBodyTextarea.value = note.body;
                });
        });
    });
});