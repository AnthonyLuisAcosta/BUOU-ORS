<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
  <tr>
    <td align="center">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
          <td align="center">
            <table border="0" cellpadding="0" cellspacing="0" role="presentation">
              <tr>
                <td>
                  <a href="{{ $url }}" class="button button-{{ $color ?? 'primary' }} inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-sky-200 hover:bg-sky-400 hover:text-gray-200 disabled:opacity-25 transition ease-in-out duration-150" target="_blank" rel="noopener">{{ $slot }}</a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
