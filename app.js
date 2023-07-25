// Imports
const express = require('express')
const app = express()
const port = 3000


// Static Files
app.use(express.static('public'))
app.use('/css', express.static(__dirname + 'public/css'))
app.use('/js', express.static(__dirname + 'public/js'))
app.use('/img', express.static(__dirname + 'public/img'))

// Set Views
app.set('views', './views')
app.set('view engine', 'ejs')

app.get('', (req, res) => {
    res.render('index', { text: 'This is EJS'})
})

app.get('/login', (req, res) => {
    res.render('login', { text: 'Login Page'})
})

app.get('/cadastro', (req, res) => {
    res.render('cadastro', { text: 'Cadastro Page'})
})

app.get('/dashboard', (req, res) => {
    res.render('dashboard', { text: 'Dashboard Page'})
})

app.get('/estoque', (req, res) => {
    res.render('estoque', { text: 'Estoque Page'})
})


app.get('/cardapio', (req, res) => {
    res.render('cardapio', { text: 'Cardapio Page'})
})

app.get('/cardapio-item', (req, res) => {
    res.render('cardapioItens', { text: 'Cardapio Itens Page'})
})

app.get('/usuarios', (req, res) => {
    res.render('usuarios', { text: 'Usuarios Page'})
})


//  Listen on port 3000
app.listen(port, () => console.info(`Listening on port ${port}`))