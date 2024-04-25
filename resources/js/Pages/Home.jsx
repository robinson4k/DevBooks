import { Link } from '@inertiajs/react'

export default function Home({books}) {
    return (
        <ul>
            <li><Link href="/books">Livros</Link></li>
            <li><a href="">Lojas</a></li>
        </ul>
    )
}