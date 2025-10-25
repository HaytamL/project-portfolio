using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.IO;



namespace WindowsFormsApp1
{
    public partial class Form1 : Form
    {
        string connectionString = "Server=localhost;Port=3308;Database=projet2k25;User Id=root;Password=;";

        public Form1()
        {
            InitializeComponent();
            timer1 = new Timer();
            timer1.Interval = 1000;
            timer1.Tick += Timer1_Tick;
        }
        private void Timer1_Tick(object sender, EventArgs e)
        {
            RafraichirDonnees();
        }

        private void RafraichirDonnees()
        {

            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string query = "SELECT heure FROM parking ORDER BY id DESC LIMIT 1";

                    MySqlCommand cmd = new MySqlCommand(query, conn);
                    object result = cmd.ExecuteScalar();

                    if (result != null)
                    {
                        heureBox.Text = result.ToString();
                    }
                    else
                    {
                        MessageBox.Show("Aucune donnée trouvée !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string query = "SELECT dimensionsface FROM parking ORDER BY id DESC LIMIT 1";

                    MySqlCommand cmd = new MySqlCommand(query, conn);
                    object result = cmd.ExecuteScalar();

                    if (result != null)
                    {
                        dimfBox.Text = "Face : " + result.ToString();
                    }
                    else
                    {
                        MessageBox.Show("Aucune donnée trouvée !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string query = "SELECT dimensionscote FROM parking ORDER BY id DESC LIMIT 1";

                    MySqlCommand cmd = new MySqlCommand(query, conn);
                    object result = cmd.ExecuteScalar();

                    if (result != null)
                    {
                        dimcBox.Text = "Cote : " + result.ToString();
                    }
                    else
                    {
                        MessageBox.Show("Aucune donnée trouvée !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string query = "SELECT abonnement FROM parking ORDER BY id DESC LIMIT 1";

                    MySqlCommand cmd = new MySqlCommand(query, conn);
                    object result = cmd.ExecuteScalar();

                    if (result != null)
                    {
                        if (result.ToString() == "True")
                        {
                            aboBox.Text = "oui";
                        }
                        else
                        {
                            aboBox.Text = "NON";
                        }
                    }
                    else
                    {
                        MessageBox.Show("Aucune donnée trouvée !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string query = "SELECT immatriculation FROM parking ORDER BY id DESC LIMIT 1";

                    MySqlCommand cmd = new MySqlCommand(query, conn);
                    object result = cmd.ExecuteScalar();

                    if (result != null)
                    {
                        immatBox.Text = result.ToString();
                    }
                    else
                    {
                        MessageBox.Show("Aucune donnée trouvée !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string query = "SELECT photo FROM parking ORDER BY id DESC LIMIT 1";

                    MySqlCommand cmd = new MySqlCommand(query, conn);
                    object result = cmd.ExecuteScalar();

                    if (result != null)
                    {
                        byte[] photoBytes = (byte[])result;
                        using (MemoryStream imageVoiture = new MemoryStream(photoBytes))
                        {
                            Image photoImage = Image.FromStream(imageVoiture);
                            pictureBox1.Image = photoImage;
                        }
                    }
                    else
                    {
                        MessageBox.Show("Aucune donnée trouvée !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }

        }

        private void button1_Click(object sender, EventArgs e)
        {
            timer1.Start();
            textBox1.Visible = false;
        }
        private void button2_Click(object sender, EventArgs e)
        {
            timer1.Stop();
            textBox1.Visible = true;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            timer1.Stop();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            timer1.Stop();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            using (MySqlConnection conn = new MySqlConnection(connectionString))
            {
                try
                {
                    conn.Open();
                    string checkQuery = "SELECT abonnement FROM parking WHERE immatriculation= '" + Convert.ToString(immatBox.Text) + "'";
                    MySqlCommand checkCmd = new MySqlCommand(checkQuery, conn);
                    object checkResult = checkCmd.ExecuteScalar();

                    if (checkResult != null)
                    {
                        bool estAbonne = Convert.ToBoolean(checkResult);

                        if (!estAbonne)
                        {
                            string updateQuery = "UPDATE parking SET abonnement = TRUE WHERE immatriculation= '" + Convert.ToString(immatBox.Text) + "'";
                            MySqlCommand updateCmd = new MySqlCommand(updateQuery, conn);
                            int rowsAffected = updateCmd.ExecuteNonQuery();
                            MessageBox.Show("L'utilisateur a été abonné avec succès !");
                        }
                        else
                        {
                            MessageBox.Show("L'utilisateur est déjà abonné.");
                        }
                    }
                    else
                    {
                        MessageBox.Show("Aucune donnée trouvée !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }
        }

        private void textBox1_KeyPress(object sender, KeyPressEventArgs e)
        {
            if (e.KeyChar == (char)13)
            {
                e.Handled = true;  
                string textBoxValue = textBox1.Text;
                try
                {
                    DateTime dateTime;
                    if (DateTime.TryParse(textBox1.Text, out dateTime))
                    {
                        using (MySqlConnection conn = new MySqlConnection(connectionString))
                        {
                            conn.Open();
                            string query = "SELECT heure FROM parking WHERE heure = @heure";
                            MySqlCommand cmd = new MySqlCommand(query, conn);
                            cmd.Parameters.AddWithValue("@heure", dateTime);
                            object result = cmd.ExecuteScalar();
                            if (result != null)
                            {
                                heureBox.Text = result.ToString();
                            }
                            else
                            {
                                MessageBox.Show("Aucune donnée trouvée !");
                            }
                            query = "SELECT dimensionsface FROM parking WHERE heure = @heure";
                            cmd = new MySqlCommand(query, conn);
                            cmd.Parameters.AddWithValue("@heure", dateTime);
                            result = cmd.ExecuteScalar();
                            if (result != null)
                            {
                                dimfBox.Text = "Face : " + result.ToString();
                            }
                            else
                            {
                                MessageBox.Show("Aucune donnée trouvée !");
                            }
                            query = "SELECT dimensionscote FROM parking WHERE heure = @heure";
                            cmd = new MySqlCommand(query, conn);
                            cmd.Parameters.AddWithValue("@heure", dateTime);
                            result = cmd.ExecuteScalar();
                            if (result != null)
                            {
                                dimcBox.Text = "Cote : " + result.ToString();
                            }
                            else
                            {
                                MessageBox.Show("Aucune donnée trouvée !");
                            }
                            query = "SELECT abonnement FROM parking WHERE heure = @heure";
                            cmd = new MySqlCommand(query, conn);
                            cmd.Parameters.AddWithValue("@heure", dateTime);
                            result = cmd.ExecuteScalar();
                            if (result != null)
                            {
                                if (Convert.ToBoolean(result))
                                {
                                    aboBox.Text = "oui";
                                }
                                else
                                {
                                    aboBox.Text = "NON";
                                }
                            }
                            else
                            {
                                MessageBox.Show("Aucune donnée trouvée !");
                            }
                            query = "SELECT immatriculation FROM parking WHERE heure = @heure";
                            cmd = new MySqlCommand(query, conn);
                            cmd.Parameters.AddWithValue("@heure", dateTime);
                            result = cmd.ExecuteScalar();
                            if (result != null)
                            {
                                immatBox.Text = result.ToString();
                            }
                            else
                            {
                                MessageBox.Show("Aucune donnée trouvée !");
                            }
                            query = "SELECT photo FROM parking WHERE heure = @heure";
                            cmd = new MySqlCommand(query, conn);
                            cmd.Parameters.AddWithValue("@heure", dateTime);
                            result = cmd.ExecuteScalar();
                            if (result != null)
                            {
                                byte[] photoBytes = (byte[])result;
                                using (MemoryStream imageVoiture = new MemoryStream(photoBytes))
                                {
                                    Image photoImage = Image.FromStream(imageVoiture);
                                    pictureBox1.Image = photoImage;
                                }
                            }
                            else
                            {
                                MessageBox.Show("Aucune donnée trouvée !");
                            }
                        }
                    }
                    else
                    {
                        MessageBox.Show("Format de date invalide !");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Erreur : " + ex.Message);
                }
            }
        }

    }
}
