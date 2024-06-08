document.addEventListener('DOMContentLoaded', function () {
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var addNoteButton = document.querySelector('.notes__add');
    var notesList = document.querySelector('.notes__list');
    var titleInput = document.querySelector('.notes__title');
    var bodyTextarea = document.querySelector('.notes__body');
    var saveButton = document.querySelector('.notes__save');

    var currentNoteId = null;

    addNoteButton.addEventListener('click', function () {
        titleInput.value = '';
        bodyTextarea.value = '';
        currentNoteId = null;
        titleInput.focus();
    });

    notesList.addEventListener('click', function (event) {
        var target = event.target;
        var listItem = target.closest('.notes__list-item');
        if (listItem) {
            var noteId = listItem.getAttribute('data-id');
            if (target.classList.contains('notes__delete')) {
                // Handle delete button click
                fetch('/notes/' + noteId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    }
                })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(function (data) {
                    if (data.success) {
                        listItem.remove();
                        if (currentNoteId == noteId) {
                            titleInput.value = '';
                            bodyTextarea.value = '';
                            currentNoteId = null;
                        }
                    }
                })
                .catch(function (error) {
                    console.error('There was a problem with the fetch operation:', error);
                });
            } else {
                // Handle selecting a note from the sidebar
                fetch('/notes/' + noteId)
                    .then(function (response) {
                        if (!response.ok) {
                            return response.text().then(text => { throw new Error(text) });
                        }
                        return response.json();
                    })
                    .then(function (note) {
                        console.log(note); // Add this line to inspect the note object
                        titleInput.value = note.Titulo;
                        bodyTextarea.value = note.Contenido;
                        currentNoteId = note.IDNota;
                    })
                    .catch(function (error) {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }
        }
    });

    saveButton.addEventListener('click', function () {
        var title = titleInput.value;
        var body = bodyTextarea.value;

        if (!title || !body) {
            alert('Please fill in both the title and body');
            return;
        }

        var payload = {
            title: title,
            body: body,
        };

        var url = currentNoteId ? '/notes/' + currentNoteId : '/notes';
        var method = currentNoteId ? 'PUT' : 'POST';

        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(payload),
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (note) {
                if (currentNoteId) {
                    var noteItem = document.querySelector('.notes__list-item[data-id="' + note.IDNota + '"]');
                    noteItem.querySelector('.notes__small-title').textContent = note.Titulo;
                    noteItem.querySelector('.notes__small-body').textContent = note.Contenido.substring(0, 50);
                    noteItem.querySelector('.notes__small-updated').textContent = new Date(note.updated_at).toLocaleString();
                } else {
                    var newNoteItem = document.createElement('div');
                    newNoteItem.classList.add('notes__list-item');
                    newNoteItem.setAttribute('data-id', note.IDNota);
                    newNoteItem.innerHTML = `
                        <div class="notes__small-title">${note.Titulo}</div>
                        <div class="notes__small-body">${note.Contenido.substring(0, 50)}</div>
                        <div class="notes__small-updated">${new Date(note.updated_at).toLocaleString()}</div>
                        <button class="notes__delete" type="button">Eliminar</button>
                    `;
                    notesList.appendChild(newNoteItem);
                }
                titleInput.value = '';
                bodyTextarea.value = '';
                currentNoteId = null;
            })
            .catch(function (error) {
                console.error('Error:', error);
            });
    });
});
