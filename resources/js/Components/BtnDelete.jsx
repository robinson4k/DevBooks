import { useState } from "react"
import { router } from '@inertiajs/react'

export default function BtnDelete({bookId, onDelete}) {
    const [confirming, setConfirming] = useState(false)
    const [processing, setProcessing] = useState(false)

    async function handleClick() {
        if (confirming) {
            setProcessing(true)
            await router.post(route('books.destroy', bookId), {
                _method: 'DELETE'
            }, {
                onSuccess: () => {
                    onDelete(bookId)
                },
                onError: () => {
                    setProcessing(false)
                }
            });
        }
        else {
            setConfirming(true)
        }
    }

    function handleCancel() {
        setConfirming(false)
    }
    return (
        <>
            <button type="button" onClick={handleClick} disabled={processing}>
                {processing ? 'Processing...' : (confirming ? 'Confirm' : 'Delete')}
            </button>
            {confirming && (
                <span>
                    {' | '}
                    <button type="button" onClick={handleCancel} disabled={processing}>Cancel</button>
                </span>
            )}
        </>
    )
}