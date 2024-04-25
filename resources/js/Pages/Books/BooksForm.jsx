import { useState } from 'react'
import styles from './Books.module.css'
import { Link } from '@inertiajs/react'

export default function BooksIndex({ books }) {
    const [nome, setNome] = useState('')
    return (
        <>
            <h1>Formulário livro</h1>

            <Link href='/books'>voltar</Link>

            <form action="">
                <div><label htmlFor="">Nome</label><input type="text" value={nome} /></div>
                <div><label htmlFor="">ISBN</label><input type="text" /></div>
                <div><label htmlFor="">Valor</label><input type="text" /></div>
            </form>
        </>
    )
}