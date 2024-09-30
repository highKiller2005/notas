addEventListener('load', () => {
    const addButton = document.querySelector('.add button')
    addButton.addEventListener('click', add)
})

function add() {
    console.log("> Adicionando nota")
}

async function edit(id) {
    console.log(`> Editando nota ${id}`)
    const nota = document.querySelector('.nota.id-1')
    const title = nota.querySelector('.titulo input').value
    const content = nota.querySelector('.conteudo').innerHTML
    /**
     * @type {HTMLSelectElement}
     */
    const categoria = nota.querySelector('.categoria select').value

    console.log(`${title} - ${content} - ${categoria}`)

    const formData = new FormData()

    formData.append('id', id)
    formData.append('title', title)
    formData.append('content', content)
    formData.append('category', categoria)

    const response = await fetch('routes/add.php', {
        method: 'POST',
        body: formData
    })
    const data = await response.json()
    console.log(data)
}

async function remove(id) {
    console.log(`> Removendo nota ${id}`)
    const formData = new FormData()

    formData.append('id', id)
    const response = await fetch('routes/delete.php', {
        method: 'POST',
        body: formData
    })

    const data = await response.json()
    console.log(data)
}