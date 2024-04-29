import styles from './Books.module.css'
import { Link, router } from '@inertiajs/react'
import { useState } from 'react'
import BtnDelete from '@/Components/BtnDelete'

export default function BooksIndex({books})
{
    const [data, setData] = useState(books)

    async function handleDeletedBook(bookId) {
        const newList = data.filter(book => {
            return book.id != bookId
        })
        setData(newList)
    }
    return (
        <>
            <h1 className='text-3xl font-bold'>
                Books - <small><Link href='/books/create'>new</Link></small>
            </h1>

            <Link href='/'>voltar</Link>

            <div>
                <label htmlFor="">Search</label>
                <input type="text" />
            </div>

            <table className={styles.table_custom}>
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>Name</th>
                        <th>ISBN</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    {data.map((item) => {
                        return (
                            <tr key={item.id}>
                                <td>
                                    <Link href={route('books.show', item.id)}>Edit</Link>
                                    <BtnDelete bookId={item.id} onDelete={handleDeletedBook} />
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