import { useState } from "react";
import styles from "./Books.module.css";
import { Link, useForm } from "@inertiajs/react";

export default function BooksIndex({ book })
{
    const {data, setData, errors, put, post, processing } = useForm({
        name: book.name,
        isbn: book.isbn,
        value: book.value
    });

    function handleNewFormValuesChange(e) {
        setData(previousState => ({
            ...previousState,
            [e.target.id]: e.target.value
        }))
    }

    function handleSaveBook(event) {
        event.preventDefault();

        if (Object.keys(book).length && book.id) {
            put(route('books.update', book.id))
        }
        else {
            post(route('books.store'))
        }
    }

    const processingText = processing ? 'Processing' : 'Save'

    return (
        <>
            <h1>
                Book form {book.id ? `- edit ${book.id}` : ''}
            </h1>

            <Link href="/books">back</Link>

            <form onSubmit={handleSaveBook}>
                <div>
                    <label htmlFor="name">Name</label>
                    <input
                        id="name"
                        value={data.name}
                        onChange={handleNewFormValuesChange}
                        type="text"
                    />
                    {errors.name && <p>{errors.name}</p>}
                </div>
                <div>
                    <label htmlFor="">ISBN</label>
                    <input
                        id="isbn"
                        value={data.isbn}
                        onChange={handleNewFormValuesChange}
                        type="text"
                    />
                    {errors.isbn && <p>{errors.isbn}</p>}
                </div>
                <div>
                    <label htmlFor="">Value</label>
                    <input
                        id="value"
                        value={data.value}
                        onChange={handleNewFormValuesChange}
                        type="text"
                    />
                    {errors.value && <p>{errors.value}</p>}
                </div>
                <button type="submit" disabled={processing}>{processingText}</button>
            </form>
        </>
    );
}
