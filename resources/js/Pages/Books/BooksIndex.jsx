import styles from './Books.module.css'
import { Link } from '@inertiajs/react'

export default function BooksIndex({books}) {
    return (
        <>
            <h1>Livros</h1>

            <Link href='/'>voltar</Link>

            <table className={styles.table_custom}>
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Nome</th>
                        <th>ISBN</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    {books.map((item) => {
                        return (
                            <tr key={item.id}>
                                <td>
                                    <Link href={`/books/${item.id}`}>Edit</Link>
                                </td>
                                <td>{item.id}</td>
                                <td>{item.name}</td>
                                <td>{item.isbn}</td>
                                <td>{item.value}</td>
                            </tr>
                        )
                    })}
                </tbody>
            </table>
        </>
    )
}