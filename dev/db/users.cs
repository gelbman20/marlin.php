using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Marlin_db
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected int _user_id;
        protected string _user_login;
        protected string _user_password;
        protected string _user_hash;
        protected int _user_ip;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string user_login, string user_password, string user_hash, int user_ip)
        {
            this._user_login=user_login;
            this._user_password=user_password;
            this._user_hash=user_hash;
            this._user_ip=user_ip;
        }
        #endregion
        #region Public Properties
        public virtual int User_id
        {
            get {return _user_id;}
            set {_user_id=value;}
        }
        public virtual string User_login
        {
            get {return _user_login;}
            set {_user_login=value;}
        }
        public virtual string User_password
        {
            get {return _user_password;}
            set {_user_password=value;}
        }
        public virtual string User_hash
        {
            get {return _user_hash;}
            set {_user_hash=value;}
        }
        public virtual int User_ip
        {
            get {return _user_ip;}
            set {_user_ip=value;}
        }
        #endregion
    }
    #endregion
}