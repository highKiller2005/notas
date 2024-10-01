addEventListener('load', () => {
    const addButton = document.querySelector('.add button')
    addButton.addEventListener('click', add)
})

async function add() {
    console.log("> Adicionando nota")
    const response = await fetch('routes/add.php')
    const data = await response.json()

    renderHtml(data)
}

async function edit(id) {
    console.log(`> Editando nota ${id}`)
    const nota = document.querySelector(`.nota.id-${id}`)
    const title = nota.querySelector('.titulo input').value
    const content = nota.querySelector('textarea.conteudo').value
    /**
     * @type {HTMLSelectElement}
     */
    const categoria = nota.querySelector('.categoria select').value

    console.log(`Titulo: ${title}`)
    console.log(`Conteudo: ${content}`)
    console.log(`Categoria: ${categoria}`)

    const formData = new FormData()

    formData.append('id', id)
    formData.append('title', title)
    formData.append('content', content)
    formData.append('category', categoria)

    const response = await fetch('routes/edit.php', {
        method: 'POST',
        body: formData
    })
    const data = await response.json()

    renderHtml(data)
    alert("Nota atualizada 😊")
}

async function remove(id) {
    const querRemover = confirm ("Tem certeza que deseja remover essa nota 🤨?")
    if (!querRemover) return

    console.log(`> Removendo nota ${id}`)

    const formData = new FormData()

    formData.append('id', id)
    const response = await fetch('routes/delete.php', {
        method: 'POST',
        body: formData
    })

    const data = await response.json()
    renderHtml(data)
}


/**
 * 
 * @param {Array<{ id: string, titulo: string, conteudo: string, categoria: string }>} data 
 */
function renderHtml(data) {
    const notesContainer = document.querySelector('.notas')
    notesContainer.innerHTML = ''
    data.forEach(note => {
        const noteElement = document.createElement('div')

        noteElement.classList.add('nota')
        noteElement.classList.add(`id-${note.id}`)
        noteElement.innerHTML = `
            <div class="header">
                <div class="titulo">
                    <input type="text" value="${note.titulo}">
                </div>
                <div class="categoria">
                    <select name="categoria" class="categoria" value="${note.categoria}">
                        ${renderOptions([
                            "pendente",
                            "concluido",
                            "vistoria"
                        ], note.categoria)}
                    </select>
                </div>
            </div>

            <div class="content">
                <textarea name="conteudo" class="conteudo">${note.conteudo}</textarea>
                <div class="acoes">
                    <button onclick="edit(${note.id})" type="button" class="salvar">
                        <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                    <button onclick="remove(${note.id})" type="button" class="excluir">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        `
        notesContainer.appendChild(noteElement)
    })
}

function renderOptions(options, selected) {
    let optionsHTML = ''
    
    options.map(option => {
        optionsHTML += `<option ${option === selected && 'selected'} value="${option}">${option}</option>`
    })

    return optionsHTML
}