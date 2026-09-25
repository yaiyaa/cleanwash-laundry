import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
	const flash = document.querySelector('[data-cleanwash-flash]');

	if (flash) {
		Swal.fire({
			icon: flash.dataset.type,
			text: flash.dataset.message,
			confirmButtonColor: '#0f6fb5',
		});
	}

	document.addEventListener('submit', async (event) => {
		const form = event.target.closest('form[data-confirm]');

		if (!form || form.dataset.confirmed === 'true') {
			return;
		}

		event.preventDefault();

		const result = await Swal.fire({
			title: 'Konfirmasi',
			text: form.dataset.confirm,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Ya, lanjutkan',
			cancelButtonText: 'Batal',
			confirmButtonColor: '#0f6fb5',
			cancelButtonColor: '#6b7280',
		});

		if (result.isConfirmed) {
			form.dataset.confirmed = 'true';
			form.requestSubmit();
		}
	});
});
