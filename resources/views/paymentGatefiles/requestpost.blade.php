<form action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction" method="POST">
    @csrf
    echo "<input type=hidden name=encRequest value=$encrypted_data>";
    echo "<input type=hidden name=access_code value=$access_code>";
    <input type="submit" name="" id="">

</form>